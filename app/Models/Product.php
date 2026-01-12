<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'subcategory',
        'image_url',
        'brand',
        'weight',
        'animal_type',
        'rating',
        'stock'
    ];
    
    // Données statiques pour la version V1 (remplacera par base de données plus tard)
    public static function getAllProducts()
    {
        return [
            [
                'id' => 1,
                'name' => 'Croquettes Premium Chien Adulte',
                'description' => 'Croquettes complètes pour chiens adultes, riches en protéines de qualité.',
                'price' => 45.90,
                'category' => 'chiens',
                'subcategory' => 'croquettes',
                'image_url' => 'https://tse4.mm.bing.net/th/id/OIP.eIee38H4KFV4_UwSZPjLfAHaHa?pid=Api&P=0&h=180',
                'brand' => 'Royal Canin',
                'weight' => '12kg',
                'animal_type' => 'Chien',
                'rating' => 4.5,
                'stock' => 50
            ],
            [
                'id' => 2,
                'name' => 'Pâtée pour Chat Stérilisé',
                'description' => 'Alimentation humide pour chats stérilisés, faible en calories.',
                'price' => 18.50,
                'category' => 'chats',
                'subcategory' => 'patees',
                'image_url' => 'https://tse4.mm.bing.net/th/id/OIP.m9sQQ_1hOAHAWd5ormsbqgHaHa?pid=Api&P=0&h=180',
                'brand' => 'Purina',
                'weight' => '12x85g',
                'animal_type' => 'Chat',
                'rating' => 4.3,
                'stock' => 100
            ],
            [
                'id' => 3,
                'name' => 'Granulés pour Lapin',
                'description' => 'Granulés complets pour lapins, enrichis en vitamines.',
                'price' => 12.90,
                'category' => 'rongeurs',
                'subcategory' => 'granules',
                'image_url' => 'https://tse4.mm.bing.net/th/id/OIP.6Q_kilzjU8PVGosHsUJV6gHaHa?pid=Api&P=0&h=180',
                'brand' => 'Versele-Laga',
                'weight' => '2kg',
                'animal_type' => 'Lapin',
                'rating' => 4.7,
                'stock' => 75
            ],
            [
                'id' => 4,
                'name' => 'Graines pour Oiseaux Mélange',
                'description' => 'Mélange de graines variées pour oiseaux de volière.',
                'price' => 8.90,
                'category' => 'oiseaux',
                'subcategory' => 'graines',
                'image_url' => 'https://sp.yimg.com/ib/th?id=OPEC.rJnjdXIYzCaTcQ474C474&o=5&pid=21.1&w=160&h=105',
                'brand' => 'Vitakraft',
                'weight' => '1kg',
                'animal_type' => 'Oiseau',
                'rating' => 4.2,
                'stock' => 120
            ],
            [
                'id' => 5,
                'name' => 'Friandises Dentaires Chien',
                'description' => 'Friandises qui nettoient les dents et rafraîchissent l\'haleine.',
                'price' => 15.90,
                'category' => 'chiens',
                'subcategory' => 'friandises',
                'image_url' => 'https://tse3.mm.bing.net/th/id/OIP.AuA0-z8_Q8Gh1qamPu4g8QHaHa?pid=Api&P=0&h=180',
                'brand' => 'Pedigree',
                'weight' => '150g',
                'animal_type' => 'Chien',
                'rating' => 4.8,
                'stock' => 200
            ],
            [
                'id' => 6,
                'name' => 'Litière Aglomérante Chat',
                'description' => 'Litière agglomérante parfum lavande, haute absorption.',
                'price' => 22.90,
                'category' => 'accessoires',
                'subcategory' => 'litiere',
                'image_url' => 'https://tse4.mm.bing.net/th/id/OIP.NEBzBPd5nyDE-YJ7YSknZQHaHa?pid=Api&P=0&h=180',
                'brand' => 'Tidy Cats',
                'weight' => '10L',
                'animal_type' => 'Chat',
                'rating' => 4.4,
                'stock' => 60
            ],
            [
                'id' => 7,
                'name' => 'Poisson Rouge Flocons',
                'description' => 'Flocons complets pour poissons rouges, enrichis en carotène.',
                'price' => 6.50,
                'category' => 'poissons',
                'subcategory' => 'flocons',
                'image_url' => 'https://tse4.mm.bing.net/th/id/OIP.-P0V1GuWnXBdWDehQB039gHaHa?pid=Api&P=0&h=180',
                'brand' => 'Tetra',
                'weight' => '250ml',
                'animal_type' => 'Poisson',
                'rating' => 4.6,
                'stock' => 150
            ],
            [
                'id' => 8,
                'name' => 'Foin de Prairie pour Rongeurs',
                'description' => 'Foin de qualité premium pour lapins, cochons d\'Inde et rongeurs.',
                'price' => 9.90,
                'category' => 'rongeurs',
                'subcategory' => 'foin',
                'image_url' => 'https://tse2.mm.bing.net/th/id/OIP.LVzQpBHS_fnrL3rVPsNoxAHaHa?pid=Api&P=0&h=180',
                'brand' => 'Bunny',
                'weight' => '1kg',
                'animal_type' => 'Rongeur',
                'rating' => 4.9,
                'stock' => 80
            ]
        ];
    }
    
    public static function getProductsByCategory($category)
    {
        return collect(self::getAllProducts())
            ->where('category', $category)
            ->values()
            ->all();
    }
    
    public static function getCategories()
    {
        return [
            'chiens' => [
                'name' => 'Chiens',
                'icon' => 'fas fa-dog',
                'color' => '#E74C3C',
                'subcategories' => ['croquettes', 'patees', 'friandises', 'compléments']
            ],
            'chats' => [
                'name' => 'Chats',
                'icon' => 'fas fa-cat',
                'color' => '#3498DB',
                'subcategories' => ['croquettes', 'patees', 'friandises', 'litiere']
            ],
            'rongeurs' => [
                'name' => 'Rongeurs',
                'icon' => 'fas fa-paw',
                'color' => '#9B59B6',
                'subcategories' => ['granules', 'foin', 'legumes', 'compléments']
            ],
            'oiseaux' => [
                'name' => 'Oiseaux',
                'icon' => 'fas fa-dove',
                'color' => '#F1C40F',
                'subcategories' => ['graines', 'fruits', 'milieux', 'compléments']
            ],
            'poissons' => [
                'name' => 'Poissons',
                'icon' => 'fas fa-fish',
                'color' => '#1ABC9C',
                'subcategories' => ['flocons', 'granules', 'vivant', 'algues']
            ],
            'accessoires' => [
                'name' => 'Accessoires',
                'icon' => 'fas fa-bone',
                'color' => '#95A5A6',
                'subcategories' => ['gamelles', 'niches', 'jouets', 'hygiène']
            ]
        ];
    }
}