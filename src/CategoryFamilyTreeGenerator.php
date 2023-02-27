<?php
namespace PureIntento\InfinityCategory;
use Illuminate\Database\Eloquent\Builder;

class CategoryFamilyTreeGenerator{
    protected $tree=array();
    protected $structuredTree=array();
    public String $categoryParentIdKeyName="parent_id";
    public String $categoryIdKeyName="id";
    public String $childNameKey="childs";
    protected $categoryMap=array();

    public function load(array $categories){
        $tree=array();
        foreach($categories as $key=>$value){
            $parentId=$value[$this->categoryParentIdKeyName];
            $categoryId=$value[$this->categoryIdKeyName];
            if($parentId==0){
                $tree[$categoryId]=$value;
                $tree[$categoryId][$this->childNameKey]=array();
                $this->categoryMap[$categoryId]=$tree[$categoryId];
                unset($categories[$key]);
            }
        }
        $this->tree=$this->makeTree($categories,$tree);
    }

    public function getCategoryMap(){
        return $this->categoryMap;
    }

    public function makeTree($categories,$tree=array()){
        $subTree=array();
        foreach($categories as $key=>$value){
            $parentId=$value[$this->categoryParentIdKeyName];
            $categoryId=$value[$this->categoryIdKeyName];
            if(array_key_exists($parentId,$tree)){
                if(!array_key_exists($parentId,$subTree)){
                    $subTree[$parentId]=array();
                    $subTree[$parentId][$categoryId]=$value;
                    $subTree[$parentId][$categoryId][$this->childNameKey]=array();
                } else {
                    $subTree[$parentId][$categoryId]=$value;
                    $subTree[$parentId][$categoryId][$this->childNameKey]=array();
                }
                $this->categoryMap[$categoryId]=$subTree[$parentId][$categoryId];
                unset($categories[$key]);   
            }
        }
        foreach($subTree as $key=>$value){
            $tree[$key][$this->childNameKey]=$this->makeTree($categories,$value);
        }
        
        return $tree;
    }

    public function getTree(){
        return $this->tree;
    }
}