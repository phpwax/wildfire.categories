<?
CMSApplication::register_module("categories", array("display_name"=>"Categories", "link"=>"/admin/categories/"));

if(!defined("CONTENT_MODEL")){
  $con = new ApplicationController(false, false);
  define("CONTENT_MODEL", $con->cms_content_class);
}


WaxEvent::add(CONTENT_MODEL.".setup", function(){
  $model = WaxEvent::data();
  $model->define("categories", "ManyToManyField", array('target_model'=>"WildfireCategory","eager_loading"=>true, "join_model_class"=>"WaxModelOrderedJoin", "join_order"=>"join_order", 'scaffold'=>false, 'group'=>'categories'));
});
?>