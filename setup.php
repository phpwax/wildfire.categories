<?
CMSApplication::register_module("categories", array("display_name"=>"Categories", "link"=>"/admin/categories/"));

AutoLoader::register_view_path("plugin", __DIR__."/view/");
AutoLoader::register_controller_path("plugin", __DIR__."/lib/controller/");
AutoLoader::register_controller_path("plugin", __DIR__."/resources/app/controller/");
AutoLoader::$plugin_array[] = array("name"=>"wildfire.categories","dir"=>__DIR__);

if(defined("CONTENT_MODEL")){
  WaxEvent::add(CONTENT_MODEL.".setup", function(){
    $model = WaxEvent::data();
    $model->define("categories", "ManyToManyField", array('target_model'=>"WildfireCategory","eager_loading"=>true, "join_model_class"=>"WaxModelOrderedJoin", "join_order"=>"join_order", 'scaffold'=>false, 'group'=>'relationships'));
  });
}
?>