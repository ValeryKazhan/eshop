<?php

namespace Database\Seeders;

use App\Services\Cart;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Purchase;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

//        Order::factory(4)->create();
//        Product::factory(8)->create(['category_id' => 1]);
//        Product::factory(10)->create(['category_id' => 2]);
//
//
//
//        foreach(Product::all() as $product){
//            Review::factory(3)->create(['product_id' => $product->id]);
//            Comment::factory(4)->create(['product_id' => $product->id]);
//        }
//
//        $johndoe = User::create(
//            ['name' => 'John Doe',
//            'username' => 'johndoe',
//            'email' => 'johndoe@mail.ru',
//            'password' => 'password' // password
//            ]
//        );

        User::create(
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'is_admin' => true,
                'password' => 'password'
            ]);

        $jack = User::create(
            [
                'name' => 'Jack Peterson',
                'username' => 'jack',
                'email' => 'jack@gmail.com',
                'is_admin' => false,
                'password' => 'password'
            ]);

        $user1 = User::create(
            [
                'name' => 'Jordan S',
                'username' => 'kassy-cynthia',
                'email' => 'kassy@gmail.com',
                'is_admin' => false,
                'password' => 'password'
            ]);

        $user2 = User::create(
            [
                'name' => 'Paul',
                'username' => 'hardy-tiana',
                'email' => 'hardy@gmail.com',
                'is_admin' => false,
                'password' => 'password'
            ]);

        $user3 = User::create(
            [
                'name' => 'Joe Miller',
                'username' => 'bobby-laura',
                'email' => 'laura@gmail.com',
                'is_admin' => false,
                'password' => 'password'
            ]);

        self::createCellPhones();
        self::createSpeakers();
        self::createOtherCategories();

        Review::factory()->create(['user_id' => $user1->id, 'rating' => 3, 'product_id' => 9, 'body' => 'A good phone but the price is a little too high though']);
        Review::factory()->create(['user_id' => $user2->id, 'rating' => 5, 'product_id' => 9, 'body' => 'Really don\'t regret about purchasing it']);
        Review::factory()->create(['user_id' => $user3->id, 'rating' => 4, 'product_id' => 9, 'body' => 'wow nice phone']);

        Order::factory(15)->create(
            [
                'purchases' => Purchase::toIdArray(
                [
                    new Purchase(Product::find(1), 4),
                    new Purchase(Product::find(3), 86),
                    new Purchase(Product::find(5), 24),
                    new Purchase(Product::find(58), 15),
                    new Purchase(Product::find(59), 19),
                    new Purchase(Product::find(60), 15)
                ])
            ]
        );

    }

    private static function createOtherCategories(){

        $cases = self::createCategory('Screen Protectors and Cases', '/img/categories/cases.jpg');
        Product::factory(26)->create(['category_id' => $cases->id]);

        $power = self::createCategory('Power Accessories', '/img/categories/power-accessories.jpg');
        Product::factory(38)->create(['category_id' => $power->id]);

        $laptops = self::createCategory('Laptops', '/img/categories/laptops.jpeg');
        Product::factory(49)->create(['category_id' => $laptops->id]);

        $keyboards = self::createCategory('Keyboards', '/img/categories/keyboards.jpeg');
        Product::factory(67)->create(['category_id' => $keyboards->id]);

        $mice = self::createCategory('Mice', '/img/categories/mice.jpeg');
        Product::factory(56)->create(['category_id' => $mice->id]);

        $connectors = self::createCategory('Connectors and Cables', '/img/categories/connectors.jpg');
        Product::factory(112)->create(['category_id' => $connectors->id]);

        $printers = self::createCategory('Printers', '/img/categories/printers.jpeg');
        Product::factory(54)->create(['category_id' => $printers->id]);

        $watches = self::createCategory('Smart Watches', '/img/categories/smart-watches.jpeg');
        Product::factory(38)->create(['category_id' => $watches->id]);

        $monitors = self::createCategory('Monitors', '/img/categories/monitors.jpeg');
        Product::factory(45)->create(['category_id' => $monitors->id]);

        $videogames = self::createCategory('Video Games', '');
        Product::factory(18)->create(['category_id' => $videogames->id]);

        $headphones = self::createCategory('Headphones', '');
        Product::factory(27)->create(['category_id' => $headphones->id]);

        $networking = self::createCategory('Networking Devices', '');
        Product::factory(34)->create(['category_id' => $networking->id]);

        $storage = self::createCategory('Removable Storage', '');
        Product::factory(89)->create(['category_id' => $storage->id]);

    }

    private static function createSpeakers()
    {
        $speakers = self::createCategory('Speakers', '/img/categories/speakers.jpg');

        $jblflip5 = self::createProduct(
            $speakers,
            'JBL Flip 5 Steal Stone White',
            109,
            [
                '/img/products/speakers/jbl-flip-5-steal/1.jpg',
                '/img/products/speakers/jbl-flip-5-steal/2.jpg'
            ],
            '',
            [
                'Announced' => '2019',
                'Status' => 'Available. Released 2019',
                'Dimensions' => '69 x 181 x 74 mm',
                'Weight' => '540g',
                'Features' => 'Transducer 2 x 40mm, IPX7 Waterproof, build-in microphone for answer call, Frequency response 70Hz – 20kHz, up to 12 hours (varies by volume level and audio content)'
            ]
        );

        $xiambluet = self::createProduct(
            $speakers,
            'Xiaomi Mi Bluetooth Speaker Mini Grey',
            33,
            [
                '/img/products/speakers/xiam/1.jpg',
                '/img/products/speakers/xiam/2.jpg'
            ],
            '',
            [
                'Dimensions' => '86 x 86 x 45 mm',
                'Weight' => '182 g',
                'Protection' => 'IP55',
                'Bluetooth' => '5.0',
                'USB' => 'Type-C'
            ]
        );

        $jblflip = self::createProduct(
            $speakers,
            'JBL Clip 3 Sand Brown',
            33,
            [
                '/img/products/speakers/jblClip/1.jpg',
                '/img/products/speakers/jblClip/2.jpg'
            ],
            '',
            [
                'Announced' => '2015, September',
                'Status' => 'Available. Released 2015, Novemeber',
                'Dimensions' => 'N/A',
                'Weight' => '150 g',
                'Features' => 'Transducer 1 x 40mm, Splashproof, build-in microphone for answer call, 15w Frequency response 160Hz – 20kHz, up to 5 hours (varies by volume level and audio content)'
            ]
        );

        $duoTen = self::createProduct(
            $speakers,
            'DuoTen IPX7 Waterproof Wireless Portable Bluetooth Speakers',
            33,
            [
                '/img/products/speakers/duoTen/1.jpg'
            ],
            '	LED screen, signal enhancement antenna, TWS super bass stereo sound, IPX7 waterproof, colorful light show, beat-driven light show,
            portable lanyard, dedicated suction cup, 8W driverLED screen, signal enhancement antenna, TWS super bass stereo sound, IPX7 waterproof, colorful light show,
            beat-driven light show, portable lanyard, dedicated suction cup, 8W driver',
            []
        );

        Product::factory(18)->create(['category_id' => $speakers->id]);
    }

    private static function createCellPhones()
    {
        $cellPhonesCategory = self::createCategory('Cell Phones', '/img/categories/cell-phones.jpeg');

        $applePhone12 = self::createProduct(
            $cellPhonesCategory,
            'Apple iPhone 12 Pro Max - 512GB - Pacific Blue',
            1799,
            [
                '/img/products/phones/Apple-iPhone-12/1.jpg',
                '/img/products/phones/Apple-iPhone-12/2.png',
            ],
            'The New iPhone 12 Pro Max 512GB Pacific Blue Color.
            Factory Unlocked Phone ! It Will Work With Any Carrier Worldwide.'
        );

        $SamsungGalaxyS20 = self::createProduct(
            $cellPhonesCategory,
            'Samsung Galaxy S20 FE Dual SIM 128GB 6GB RAM SM-G780F/DS Cloud Navy Blue',
            634,
            [
                '/img/products/phones/samsung-garaxy-s20/1.jpg',
                '/img/products/phones/samsung-garaxy-s20/2.jpg',
            ],
            '',
            [
                'Dimensions' => '159.8 x 74.5 x 8.4 mm',
                'Weight' => '190 g',
                'Build' => 'Glass front (Gorilla Glass 3), plastic back, aluminum frame',
                'SIM' => 'Hybrid Dual SIM (Nano-SIM, dual stand-by)'
            ]
        );

        $Ulefone = self::createProduct(
            $cellPhonesCategory,
            'Ulefone Armor 11 5G Dual SIM 256GB 8GB RAM Black',
            399,
            [
                '/img/products/phones/ulefone/1.jpg',
                '/img/products/phones/ulefone/2.jpg',
            ],
            '',
            [
                'Dimensions' => '163.8 x 81.6 x 14.2 mm',
                'Weight' => '295 g',
                'Build' => 'Front glass, aluminum back with rubber, aluminum frame',
                'SIM' => 'Dual SIM (Nano-SIM, dual stand-by)'
            ]
        );

        $xiaomiMi = self::createProduct(
            $cellPhonesCategory,
            'Xiaomi Mi 11 Lite Dual SIM 128GB 6GB RAM Black',
            399,
            [
                '/img/products/phones/xiaomi-mi/1.jpg',
                '/img/products/phones/xiaomi-mi/2.jpg',
            ],
            '',
            [
                'Technology' => 'GSM / HSPA / LTE',
                '2G bands' => 'GSM 850 / 900 / 1800 / 1900 SIM 1 & SIM 2',
                '3G bands' => 'HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100',
                '4G bands' => '1, 2, 3, 4, 5, 7, 8, 12, 17, 20, 28, 32, 38, 40, 41, 66',
                'Dimensions' => '160.5 x 75.7 x 6.8 mm',
                'Wieght' => '157 g',
                'SIM' => 'Hybrid Dual SIM (Nano-SIM, dual stand-by)'
            ]
        );

        $samsungGalaxyZ = self::createProduct(
            $cellPhonesCategory,
            'Samsung Galaxy Z Flip3 5G Dual SIM 128GB 8GB RAM SM-F711B Black',
            921,
            [
                '/img/products/phones/samsung-galaxy-z/1.jpeg',
                '/img/products/phones/samsung-galaxy-z/2.jpeg'
            ],
            '',
            [
                'Technology' => 'GSM / CDMA / HSPA / EVDO / LTE / 5G',
                '2G bands' => 'GSM 850 / 900 / 1800 / 1900',
                '3G bands' => 'HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100',
                '4G bands' => 'HSPA 42.2/5.76 Mbps, LTE-A (6CA) Cat20 2000/200 Mbps, 5G',
                '5G' => '2, 5, 25, 41, 66, 71, 260, 261 SA/NSA/Sub6/mmWave',
                'Dimensions' => '1, 2, 3, 4, 5, 7, 8, 12, 13, 14, 18, 19, 20, 25, 26, 28, 30, 38, 39, 40, 41, 46, 48, 66, 71',
                'Wieght' => '183 g (6.46 oz)',
                'SIM' => 'Nano-SIM, eSIM'
            ]
        );

        $apple11 = self::createProduct(
            $cellPhonesCategory,
            'Apple iPhone 11 Dual eSIM 64GB 4GB RAM White',
            632,
            [
                '/img/products/phones/apple11/1.jpg',
                '/img/products/phones/apple11/2.jpg',
            ],
            '',
            [
                'Technology' => 'GSM / CDMA / HSPA / EVDO / LTE / 5G',
                '2G bands' => 'GSM 850 / 900 / 1800 / 1900',
                '3G bands' => 'HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100',
                '4G bands' => 'HSPA 42.2/5.76 Mbps, LTE-A (6CA) Cat20 2000/200 Mbps, 5G',
                '5G' => '2, 5, 25, 41, 66, 71, 260, 261 SA/NSA/Sub6/mmWave',
                'Dimensions' => '1, 2, 3, 4, 5, 7, 8, 12, 13, 14, 18, 19, 20, 25, 26, 28, 30, 38, 39, 40, 41, 46, 48, 66, 71',
                'Wieght' => '183 g (6.46 oz)',
                'SIM' => 'Nano-SIM, eSIM'
            ]
        );

        $googlePixel = self::createProduct(
            $cellPhonesCategory,
            'Google Pixel 4a Dual eSIM 128GB 6GB RAM Black',
            424,
            [
                '/img/products/phones/google-pixel/1.jpg',
                '/img/products/phones/google-pixel/2.jpg',
            ],
            '',
            [
                'Technology' => 'GSM / CDMA / HSPA / EVDO / LTE / 5G',
                '2G bands' => 'GSM 850 / 900 / 1800 / 1900',
                '3G bands' => 'HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100',
                '4G bands' => 'HSPA 42.2/5.76 Mbps, LTE-A (6CA) Cat20 2000/200 Mbps, 5G',
                '5G' => '2, 5, 25, 41, 66, 71, 260, 261 SA/NSA/Sub6/mmWave',
                'Dimensions' => '1, 2, 3, 4, 5, 7, 8, 12, 13, 14, 18, 19, 20, 25, 26, 28, 30, 38, 39, 40, 41, 46, 48, 66, 71',
                'Wieght' => '183 g (6.46 oz)',
                'SIM' => 'Nano-SIM, eSIM'
            ]
        );

        $appleXR = self::createProduct(
            $cellPhonesCategory,
            'Apple iPhone XR Dual eSIM 128GB Red',
            578,
            [
                '/img/products/phones/apple-xr/1.jpg',
                '/img/products/phones/apple-xr/2.jpg',
            ],
            '',
            [
                'Technology' => 'GSM / CDMA / HSPA / EVDO / LTE / 5G',
                '2G bands' => 'GSM 850 / 900 / 1800 / 1900',
                '3G bands' => 'HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100',
                '4G bands' => 'HSPA 42.2/5.76 Mbps, LTE-A (6CA) Cat20 2000/200 Mbps, 5G',
                '5G' => '2, 5, 25, 41, 66, 71, 260, 261 SA/NSA/Sub6/mmWave',
                'Dimensions' => '1, 2, 3, 4, 5, 7, 8, 12, 13, 14, 18, 19, 20, 25, 26, 28, 30, 38, 39, 40, 41, 46, 48, 66, 71',
                'Wieght' => '183 g (6.46 oz)',
                'SIM' => 'Nano-SIM, eSIM'
            ]
        );

        $samsungGalaxyA52 = self::createProduct(
            $cellPhonesCategory,
            'Samsung Galaxy A52 5G Dual SIM 128GB 6GB RAM SM-A526B/DS Black',
            530,
            [
                '/img/products/phones/samsing-galaxy-a52/1.jpg',
                '/img/products/phones/samsing-galaxy-a52/2.jpg',
            ],
            '',
            [
                'Technology' => 'GSM / HSPA / LTE / 5G',
                '2G bands' => 'GSM 850 / 900 / 1800 / 1900 SIM 1 & SIM 2',
                '3G bands' => 'HSDPA 850 / 900 / 1900 / 2100',
                'Speed' => 'HSPA 42.2/5.76 Mbps, LTE-A, 5G',
                '4G bands' => 'LTE (unspecified)',
                '5G' => 'SA/NSA',
                'Announced' => '2021, March 17',
                'Status' => 'Available. Released 2021, March 19',
                'Dimensions' => '159.9 x 75.1 x 8.4 mm',
                'Weight' => '189 g',
                'SIM' => 'Hybrid Dual SIM (Nano-SIM, dual stand-by)'
            ]
        );

        $onePlus = self::createProduct(
            $cellPhonesCategory,
            'OnePlus 8 5G Dual SIM 128GB 8GB RAM IN2010 Interstellar Glow White',
            411,
            [
                '/img/products/phones/oneplus/1.jpg',
                '/img/products/phones/oneplus/2.jpg',
            ],
            '',
            [
                'Technology' => 'GSM / HSPA / LTE / 5G',
                '2G bands' => 'GSM 850 / 900 / 1800 / 1900 SIM 1 & SIM 2',
                '3G bands' => 'HSDPA 850 / 900 / 1900 / 2100',
                'Speed' => 'HSPA 42.2/5.76 Mbps, LTE-A, 5G',
                '4G bands' => 'LTE (unspecified)',
                '5G' => 'SA/NSA',
                'Announced' => '2021, March 17',
                'Status' => 'Available. Released 2021, March 19',
                'Dimensions' => '159.9 x 75.1 x 8.4 mm',
                'Weight' => '189 g',
                'SIM' => 'Hybrid Dual SIM (Nano-SIM, dual stand-by)'
            ]
        );

        $blackView = self::createProduct(
            $cellPhonesCategory,
            'Blackview BL6000 Pro 5G Dual SIM 256GB 8GB RAM Silver',
            388,
            [
                '/img/products/phones/blackview/1.jpg',
                '/img/products/phones/blackview/2.jpg',
            ],
            '',
            [
                'Technology' => 'GSM / HSPA / LTE / 5G',
                '2G bands' => 'GSM 850 / 900 / 1800 / 1900 SIM 1 & SIM 2',
                '3G bands' => 'HSDPA 850 / 900 / 1900 / 2100',
                'Speed' => 'HSPA 42.2/5.76 Mbps, LTE-A, 5G',
                '4G bands' => 'LTE (unspecified)',
                '5G' => 'SA/NSA',
                'Announced' => '2021, March 17',
                'Status' => 'Available. Released 2021, March 19',
                'Dimensions' => '159.9 x 75.1 x 8.4 mm',
                'Weight' => '189 g',
                'SIM' => 'Hybrid Dual SIM (Nano-SIM, dual stand-by)'
            ]
        );

        Product::factory(46)->create(['category_id' => $cellPhonesCategory->id]);

    }

    private static function createCategory(string $categoryName, string $image)
    {
        return Category::create([
            'name' => $categoryName,
            'slug' => Str::slug($categoryName),
            'image' => $image
        ]);
    }

    private static function createProduct(Category $category, string $productName, int $price, array $images, string $description = '', array $specification = [])
    {
        return Product::create([
            'category_id' => $category->id,
            'slug' => Str::slug($productName),
            'name' => $productName,
            'description' => $description,
            'price' => $price,
            'specification' => $specification,
            'images' => $images
        ]);
    }

}


