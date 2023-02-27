<?php
namespace PureIntento\InfinityCategory;
use PureIntento\InfinityCategory\Models\Category as CategoryModel;

class CategoryUtil{
    
    /**
     * This method return builder join between categories and category_languages table
     * @return Illuminate\Database\Eloquent\Builder
     */
    public static function get(int $id,int $language_id) : \Illuminate\Database\Eloquent\Builder{
        return CategoryModel::join("category_languages","categories.id","category_languages.category_id")->where("categories.id",$id)->where("language_id",$language_id);
    }

    /**
     * This method return builder join between categories and category_languages table
     * @return Illuminate\Database\Eloquent\Builder
     */
    public static function getByLang($language_id) : \Illuminate\Database\Eloquent\Builder{
        return CategoryModel::join("category_languages","categories.id","category_languages.category_id")->where("language_id",$language_id);
    }

    /**
     * This method return builder join between categories and category_languages with query for childs from parent_id category
     * @return Illuminate\Database\Eloquent\Builder
     */
    public static function getChilds(int $parent_id,int $language_id) : \Illuminate\Database\Eloquent\Builder {
        return CategoryModel::join("category_languages","categories.id","category_languages.category_id")->where("categories.parent_id",$parent_id)->where("language_id",$language_id);
    }
}