<?php

namespace App\Models\Tools;

/**
 * Created by PhpStorm.
 * User: 1
 * Date: 29.07.2018
 * Time: 14:51
 */
class Top10
{

    public function index($data) {
        $keys=explode("\n", $data['keys']);
        $resp = $this->getInfo($keys, $data['lr'], (int) $data['deep']);
        return $resp;
    }

    private function getResponse($query, $region) {
        $Yandex = new Yandex();
        $Yandex -> query($query)
            -> host(null)                      // set one host or multihost
            -> page(0)                      // set current page
            -> limit(100)                        // set page limit
            -> lr($region)                        // set geo region - http://search.yaca.yandex.ru/geo.c2n
            -> sortby(Yandex::SORT_RLV)
            -> groupby(Yandex::GROUP_SITE)
            -> set('maxpassages',4)
            -> request()                        // send request
        ;

        $rps_limits = FALSE;
        $i = 0;
        do {
            $response = $Yandex->response->results->grouping;
            $responseErrorCode = 0;
            if($Yandex->response->error){
                $responseErrorCode = (int)$Yandex->response->error->attributes()->code[0];
            }
            if($responseErrorCode == 55){
                $rps_limits = TRUE;
                $i++;
                if($i == 5) break;
                sleep(2);
            }else{
                $rps_limits = FALSE;
            }
        }while ($rps_limits === TRUE);

        //if($Yandex->response->error) $GLOBALS['responseErrorCode'] = (int)$Yandex->response->error->attributes()->code[0];

        return $response;
    }
    public function formatURL($url,$URLmaxs) {
        if (strlen($url)<=$URLmaxs) {
            return "<a href='$url' target='_blank'>$url</a>";
        } else {
            return "<a href='$url' title='$url' target='_blank'>".substr($url,0,$URLmaxs)."...</a>";
        }
    }
    public function formatBlock($block,$tag) {
        $result=array();
        $S=explode('{'.$tag.'}',$block);
        $result["header"]=$S[0];
        $S=explode('{/'.$tag.'}',$S[1]);
        $result["center"]=$S[0];
        $result["footer"]=$S[1];
        return $result;
    }


    public function getInfo($keys,$region, $deep=10) {
        $oneBlockCount=4; //кол-во блоков в одной "строке"(в одном div)
        $limit=100; //лимит ключевых слов
        //кол-во сайтов в топе
        $top=(int) $deep;
        if (!$top) {
            $top=10;
        }

        $URLmaxs=35; //максимальное кол-во символов в url
        $colors=array(
            "#FFD700",
            "#00F5FF",
            "#F5DEB3",
            "#FFA07A",
            "#EE82EE",
            "#DAA520",
            "#ADFF2F",
            "#0000FF",
            "#FFFF00",
            "#90EE90",
            "#008B8B",
            "#A9A9A9",
            "#4F4F4F",
            "#8B7B8B",
            "#5D478B",
            "#FFBBFF",
            "#8B668B",
            "#FF00FF",
            "#CD8C95",
            "#FF0000",
            "#FF4500",
            "#8B4500",
            "#EE7600",
            "#FF4040",
            "#8B4513",
            "#CDBA96",
            "#8B658B",
            "#CDCD00",
            "#8B8B7A",
            "#9ACD32",
            "#00EE00",
            "#20B2AA"
        );
        $block="
			<div style='width:auto; clear: both; display:block'>
				{table}
				<table style='width:280px;float:left;' class='table'>
					<thead>
						<tr>
						  <th>#</th>
						  <th>{key}</th>
						</tr>
					</thead>
						{tr}
						<tr>
							<td>{number}</td>
							<td style='background-color:{color};'>{url}</td>
						</tr>
						{/tr}
					<tbody>
					</tbody>
				</table>
				{/table}
			</div>";

        //предварительные... работы
        $div=$this->formatBlock($block,"table");
        $table=$this->formatBlock($div["center"],"tr");

        $count=min($limit,count($keys));
        $blockCount=ceil($count/$oneBlockCount);

        //нахождение url-ов
        $url=array();
        $UrlColor=array();
        $urlCount=0;
        for ($index=0;$index<$count;$index++) {
            $url[$index]=array();
            if (trim($keys[$index])) {
                $response = $this->getResponse(trim($keys[$index]), $region);

                #TODO: переключение
                ///$response = $this->checkXmlErrors($keys[$index], $region, $response);
                for ($k = 0; $k < $top; $k++) {
                    $url[$index][$k] = $response->group[$k]->doc->url . "";
                    if (!(isset($UrlColor[$url[$index][$k]]))) {
                        $UrlColor[$url[$index][$k]] = "#FFFFFF";
                    } else {
                        if ($UrlColor[$url[$index][$k]] == "#FFFFFF") {
                            $UrlColor[$url[$index][$k]] = $colors[$urlCount];
                            $urlCount++;
                        }
                    }
                }
            }
        }

        //форматирование
        $result="";

        for ($i=0;$i<$blockCount;$i++) {
            $divBlock="";
            for ($j=0;$j<$oneBlockCount;$j++) {
                $index=$i*$oneBlockCount+$j;
                if ($index==$count) {
                    break;
                }
                $SBlock="";
                for ($k=0;$k<$top;$k++) {
                    $SBlock.=str_replace("{url}",$this->formatURL($url[$index][$k],$URLmaxs),$table['center']);
                    $SBlock=str_replace("{color}",$UrlColor[$url[$index][$k]],$SBlock);
                    $SBlock=str_replace("{number}",$k+1,$SBlock);
                }
                $SBlock=$table['header'].$SBlock.$table['footer'];
                $divBlock.=$SBlock;
                $divBlock=str_replace("{key}",$keys[$index],$divBlock);
            }
            $result.=$div['header'].$divBlock.$div['footer'];
        }
        return $result;
    }

    private function checkXmlErrors($key, $region, $response){
        return $response;
        if($GLOBALS['responseErrorCode'] === 32 OR $GLOBALS['responseErrorCode'] === 55){
            $GLOBALS['xmlUser'] = $GLOBALS['xmlUserSecondary'];
            $GLOBALS['xmlKey'] = $GLOBALS['xmlKeySecondary'];
            $GLOBALS['responseError'] = null;
            $GLOBALS['responseErrorCode'] = null;
            $response = getResponse($key, $region);
        }
        return $response;
    }

}