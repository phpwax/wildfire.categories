<?
CMSApplication::register_module("categories", array("display_name"=>"Categories", "link"=>"/admin/categories/"));

if(defined("CONTENT_MODEL")){
  WaxEvent::add(CONTENT_MODEL.".setup", function(){
    $model = WaxEvent::data();
    $model->define("categories", "ManyToManyField", array('target_model'=>"WildfireCategory","eager_loading"=>true, "join_model_class"=>"WaxModelOrderedJoin", "join_order"=>"join_order", 'scaffold'=>false, 'group'=>'categories'));
  });
}
?>