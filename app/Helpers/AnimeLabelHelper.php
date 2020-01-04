<?php

namespace App\Helpers;

use App\detail_animes;
use App\amount_hot_animes;
use App\list_user_animes;

class AnimeLabelHelper
{
    public function RuleAnime($value)
    {
        $anime_hash = strtolower(str_replace(" ", "-", str_replace("`", "", str_replace("~", "", str_replace(" -", "", str_replace("'", "", preg_replace('~[\\\\/:*?!@#$%^&()"<>,|.]~', '', $value)))))));
        return $anime_hash;
    }

    public function label_hot($id)
    {
        $label_hot_q = amount_hot_animes::orderBy('amount_views', 'DESC')->limit(15, 0)->get();
        $array = array();
        foreach( $label_hot_q as $label_hot_q2 ){
            $array[] = $label_hot_q2->id_anime;
        }

        if(in_array($id, $array)){
            $html = "<div class='label-hot float-left'>H</div>";
            return $html;
        }
    }

    public function label_new($id, $class=0)
    {
        $label_new_q = detail_animes::where('id_anime', $id)->first();
        if(time() - strtotime($label_new_q->created_at) < (60*60*24*60)){
            if($class == 1){
                $html = "<div class='label-new label-new-hot'>N</div>";
            } else {
                $html = "<div class='label-new float-left ml-1'>N</div>";
            }
            return $html;
        }
    }

    public function count_list_anime($id)
    {
        return list_user_animes::where('id_anime', $id)->get()->count();
    }

    public static function instance()
    {
        return new AnimeLabelHelper();
    }
}
