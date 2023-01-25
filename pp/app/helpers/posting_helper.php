<?php
/*Start Action info fetch one recored*/
function get_sub_postings_of($id, $postings)
{
	$sub_posting =array();
	$done_ids = array();
 	foreach($postings as $k=>$posting){
		if($posting->parent_posting_id==$id){
			$sub_posting[] = $posting;
			$done_ids[] = $posting->id;
		}
	}
	return array('sub_posting'=>$sub_posting, 'done_ids'=>$done_ids);
}
function doThisPostingHaveChildren($post,$postings){
	$children_ids = array();
        if($post!=null){
            foreach($postings as $k=>$posting){
                if($post->id==$posting->parent_posting_id){
                    $children_ids[$posting->id]=$posting;
                }
            }
        }
	if(!empty($children_ids)){
            return $children_ids;
	}else{
            return false;
	}
}
/**
 * 
 * @param type $all_postings_id_obj_pair
 */
function posting_get_ordered_posting_ids($all_postings_id_obj_pair,$root_id){
    $order_posting_ids = [];
    $selected_post = [];
    foreach($all_postings_id_obj_pair as $k=>$val){
        if($val->id==1){
            $selected_post = $val;
        }
    }
    abc($selected_post,$all_postings_id_obj_pair,$order_posting_ids);
    //var_dump($order_posting_ids);
    return $order_posting_ids;
}
function abc($selected_post,$all_postings_id_obj_pair,&$order_posting_ids){
    if(doThisPostingHaveChildren($selected_post,$all_postings_id_obj_pair)){
        $sub_postings =        get_sub_postings_of($selected_post->id, $all_postings_id_obj_pair);
        foreach($sub_postings['sub_posting'] as $k=>$selected_post_){
            abc($selected_post_,$all_postings_id_obj_pair,$order_posting_ids);
        }
    }else{
        if($selected_post!=null){
            $order_posting_ids[] = $selected_post->id;
        }
    }
}
?>