<?php
namespace Models;
use Illuminate\Database\Eloquent\Model as Model;

class Post extends Model {
        
        protected $table;
        public $timestamps = false;
        
        function __construct() {
                parent::__construct();
                $this->table = $this->get_table_name('posts');
        }
        
        
        private function get_table_name($name) {
                global $wpdb;
                return $wpdb->prefix.$name;
        }
        

        static function published(){
                return Post::where([["post_type", "=", "post"],["post_status", "=", "publish"]])->get();
        }

        static function get_post_by_id($id){
                return Post::where([["post_type", "=", "post"],["post_status", "=", "publish"],["ID" , "=" , $id]])->first();
        }

        static function image($size="large"){
            return get_the_post_thumbnail_url($this->id,'large');
        }
}