<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Garlic',
                'image' => 'images/vegetable/กระเทียม.jpg',
                'category_id' => 1,
                'description' => 'special garlic that can be used to fight Dracula',
                'price' => 500,
                'stock_quantity' => 4,
                'popularity' => 2,
            ],
            [
                'name' => 'Cabbage',
                'image' => 'images/vegetable/กะหล่ำปลี.jpg',
                'category_id' => 1,
                'description' => 'His name is a portmanteau of "cabbage" and "catapult", a ballistic device used to hurl large stones for warfare purpose in ancient times, referring to the fact that he hurls cabbages at',
                'price' => 20,
                'stock_quantity' => 400,
                'popularity' => 4,
            ],
            [
                'name' => 'Danvers Carrot',
                'image' => 'images/vegetable/แครอท.jpg', // Corrected path
                'category_id' => 1,
                'description' => 'a tapering orange-coloured root eaten as a vegetable:',
                'price' => 10,
                'stock_quantity' => 75,
                'popularity' => 4,
            ],
            [
                'name' => 'Baby Carrot',
                'image' => 'images/vegetable/เบบี้แครอท.jpg', 
                'category_id' => 1,
                'description' => 'little monk?',
                'price' => 10,
                'stock_quantity' => 100,
                'popularity' => 5,
            ],
            [
                'name' => 'Japanese Bunching Onion',
                'image' => 'images/vegetable/ต้นหอมญี่ปุ่น.jpg', // Corrected path
                'category_id' => 1,
                'description' => 'A-da-cha-choi-ka-dee-dee-ka-dee-dee-pa-da-dis-tun-de-un-de-dun-do-pa-a-di-pad-da-pa-dee-pa-di-pa-dee-dee-di-dee-di-dis-tun-de-a-do',
                'price' => 30,
                'stock_quantity' => 80,
                'popularity' => 3,
            ],
            [
                'name' => 'Cucumber',
                'image' => 'images/vegetable/แตงกวา.jpg', // Corrected path
                'category_id' => 1,
                'description' => 'Rinse your face with cucumber-infused water. Add unpeeled slices of cucumber to a pitcher of water and let the mixture sit for two to four hours.',
                'price' => 6,
                'stock_quantity' => 100,
                'popularity' => 5,
            ],
            [
                'name' => 'Yardlong bean',
                'image' => 'images/vegetable/ถั่วฝักยาว.jpg', // Corrected path
                'category_id' => 1, // Vegetables category
                'description' => 'Yardlong beans, commonly known as long beans or Chinese long beans, are a type of legume widely popular in Asian cuisine.',
                'price' => 20,
                'stock_quantity' => 80,
                'popularity' => 4,
            ],
            [
                'name' => 'Snap pea',
                'image' => 'images/vegetable/ถั่วลันเตา.jpg', // Corrected path
                'category_id' => 1, // Vegetables category
                'description' => 'The snap pea, also known as the sugar snap pea, is an edible-pod pea with rounded pods and thick pod walls, in contrast to snow pea pods, which are flat with thin walls.[3] The name mangetout (French for "eat all") can apply to snap peas and snow peas.',
                'price' => 20,
                'stock_quantity' => 100,
                'popularity' => 3,
            ],
            [
                'name' => 'Broccoli',
                'image' => 'images/vegetable/บล็อคโคลี่.jpg', // Corrected path
                'category_id' => 1, // Vegetables category
                'description' => 'mini Bonsai',
                'price' => 12,
                'stock_quantity' => 60,
                'popularity' => 4,
            ],
            [
                'name' => 'Chinese Okra',
                'image' => 'images/vegetable/บวบ.jpg', // Corrected path
                'category_id' => 1, // Vegetables category
                'description' => 'Chinese okra is a long, ridged, dark green vegetable grown on tropical and subtropical vines. ',
                'price' => 25,
                'stock_quantity' => 80,
                'popularity' => 3,
            ],
            [
                'name' => 'Chinese Cabbage',
                'image' => 'images/vegetable/ผักกาดขาว.jpg', // Corrected path
                'category_id' => 1,
                'description' => 'It has a light, sweet flavor and a crisp texture, making it a versatile ingredient in a variety of dishes.',
                'price' => 10,
                'stock_quantity' => 200,
                'popularity' => 5,
            ],
            [
                'name' => 'Lettuce',
                'image' => 'images/vegetable/ผักกาดหอม.jpg', // Corrected path
                'category_id' => 1,
                'description' => 'Headbutter Lettuces bash zombies in front and behind while occasionally buttering zombies.',
                'price' => 7,
                'stock_quantity' => 90,
                'popularity' => 4,
            ],
            [
                'name' => 'Spinach',
                'image' => 'images/vegetable/ผักโขม.jpg', // Corrected path
                'category_id' => 1,
                'description' => 'Guaranteed by popeye',
                'price' => 14,
                'stock_quantity' => 40,
                'popularity' => 5,
            ],
            [
                'name' => 'Coriander',
                'image' => 'images/vegetable/ผักชี.jpg',
                'category_id' => 1,
                'description' => 'It is a soft plant growing to 50 cm (20 in) tall. The leaves are variable in shape, broadly lobed at the base of the plant, and slender and feathery higher on the flowering stems.',
                'price' => 15,
                'stock_quantity' => 2000,
                'popularity' => 5,
            ], 
            [
                'name' => 'Water Convolvulus',
                'image' => 'images/vegetable/ผักบุ้งจีน.jpg',
                'category_id' => 1,
                'description' => 'Yak Kin Phat Phakbung Faidaeng Mai',
                'price' => 24,
                'stock_quantity' => 100,
                'popularity' => 4,
            ],
            [
                'name' => 'Red Spur Chili',
                'image' => 'images/vegetable/พริก.jpg', // Corrected path
                'category_id' => 1,
                'description' => 'The Red Hot Chili Peppers are an American rock band formed in Los Angeles in 1982, comprising vocalist Anthony Kiedis, bassist Flea, drummer Chad Smith, and guitarist John Frusciante.',
                'price' => 10,
                'stock_quantity' => 111,
                'popularity' => 4,
            ],
            [
                'name' => 'Birds Eye Chili',
                'image' => 'images/vegetable/พริกขี้หนู.jpg', 
                'category_id' => 1,
                'description' => 'Cultivated across Southeast Asia, it is used extensively in many Asian cuisines. ',
                'price' => 10,
                'stock_quantity' => 100,
                'popularity' => 5,
            ],
            [
                'name' => 'Jalapeño Chili',
                'image' => 'images/vegetable/พริกจาลาปิโน่.jpg', 
                'category_id' => 1,
                'description' => 'The jalapeño is a medium-sized chili pepper pod type cultivar of the species Capsicum annuum. A mature jalapeño chili is 5–10 cm (2–4 in) long and 25–38 mm (1–1+1⁄2 in) wide, and hangs down from the plant.',
                'price' => 10,
                'stock_quantity' => 100,
                'popularity' => 5,
            ],
            [
                'name' => 'Sweet Chili',
                'image' => 'images/vegetable/พริกหวาน.jpg', 
                'category_id' => 1,
                'description' => 'Sweet than your Ex',
                'price' => 10,
                'stock_quantity' => 100,
                'popularity' => 5,
            ],
            [
                'name' => 'Pumpkin',
                'image' => 'images/vegetable/ฟักทอง.jpg', // Corrected path
                'category_id' => 1,
                'description' => 'Jack O Lantern',
                'price' => 130,
                'stock_quantity' => 13,
                'popularity' => 3,
            ],
            [
                'name' => 'Tomato',
                'image' => 'images/vegetable/มะเขือเทศ.jpg', // Corrected path
                'category_id' => 1,
                'description' => 'Rotten Tomatoes is an American review-aggregation website for film and television.',
                'price' => 8,
                'stock_quantity' => 90,
                'popularity' => 5,
            ],
            [
                'name' => 'Cherry Tomato',
                'image' => 'images/vegetable/มะเขือเทศเชอร์รี่.jpg', 
                'category_id' => 1,
                'description' => 'It is tomato not Cherry.',
                'price' => 20,
                'stock_quantity' => 100,
                'popularity' => 5,
            ],
            [
                'name' => 'Black Krim Tomato',
                'image' => 'images/vegetable/มะเขือเทศแบล็คคริม.jpg', 
                'category_id' => 1,
                'description' => 'Ma Khua test cream dam',
                'price' => 13,
                'stock_quantity' => 80,
                'popularity' => 3,
            ],
            [
                'name' => 'Grape Tomato',
                'image' => 'images/vegetable/มะเขือเทศองุ่น.jpg', 
                'category_id' => 1,
                'description' => 'Try to guess whether it is a tomato or a grape.',
                'price' => 10,
                'stock_quantity' => 100,
                'popularity' => 5,
            ],
            [
                'name' => 'Potato',
                'image' => 'images/vegetable/มันฝรั่ง.jpg', // Corrected path
                'category_id' => 1,
                'description' => 'Fresh potatoes',
                'price' => 9,
                'stock_quantity' => 80,
                'popularity' => 5,
            ],
            [
                'name' => 'Onion',
                'image' => 'images/vegetable/หอมใหญ่.jpg', // Corrected path
                'category_id' => 1,
                'description' => 'Sweet onion for fake cry',
                'price' => 9,
                'stock_quantity' => 80,
                'popularity' => 5,
            ],
            [
                'name' => 'Champignon mushroom',
                'image' => 'images/vegetable/เห็ดแชมปิญอง.jpg', // Corrected path
                'category_id' => 1,
                'description' => 'Fresh Champignon mushroom',
                'price' => 9,
                'stock_quantity' => 110,
                'popularity' => 5, 
            ],
            [
                'name' => 'Cavendish Banana',
                'image' => 'images/fruit/กล้วยหอม.jpg', // Corrected path
                'category_id' => 2, // Fruits category
                'description' => 'Ba-ba-ba-ba-ba-nana ba-ba-ba-ba-ba-nana banana-ah-ahhhhh (ba-ba-ba-ba-ba-nana) potato-ta-ah-ahhhhhhh (ba-ba-ba-ba-ba-nana) banana-ah-ahhhhhhh (ba-ba-ba-ba-ba-nana)',
                'price' => 10,
                'stock_quantity' => 100,
                'popularity' => 5,
            ],
            [
                'name' => 'Plantain Banana',
                'image' => 'images/fruit/กล้วยดิบ.jpg', // Corrected path
                'category_id' => 2, // Fruits category
                'description' => 'raw banana hai lueang kon',
                'price' => 12,
                'stock_quantity' => 200,
                'popularity' => 5,
            ],
            [
                'name' => 'Lady Finger Banana',
                'image' => 'images/fruit/กล้วยเล็บมือนาง.jpg', // Corrected path
                'category_id' => 2, // Fruits category
                'description' => 'her nail not my nail',
                'price' => 15,
                'stock_quantity' => 100,
                'popularity' => 4,
            ],
            [
                'name' => 'Namwa Banana',
                'image' => 'images/fruit/กล้วยน้ำหว้า.jpg', // Corrected path
                'category_id' => 2, // Fruits category
                'description' => 'Nam Wa Mai Yak Kin Nam Wa',
                'price' => 13,
                'stock_quantity' => 90,
                'popularity' => 5,
            ],
            [
                'name' => 'Khai Banana',
                'image' => 'images/fruit/กล้วยไข่.jpg', // Corrected path
                'category_id' => 2, // Fruits category
                'description' => 'It is not made by chickens.',
                'price' => 10,
                'stock_quantity' => 50,
                'popularity' => 5,
            ],
            [
                'name' => 'Kiwi',
                'image' => 'images/fruit/กีวี.jpg', // Corrected path
                'category_id' => 2,
                'description' => 'Kiwi have a highly developed sense of smell, unusual in a bird, and are the only birds with nostrils at the end of their long beaks.',
                'price' => 20,
                'stock_quantity' => 50,
                'popularity' => 4,
            ],
            [
                'name' => 'Rose Apple',
                'image' => 'images/fruit/ชมพู่.jpg', // Corrected path
                'category_id' => 2,
                'description' => 'Crunchy rose apples',
                'price' => 15,
                'stock_quantity' => 75,
                'popularity' => 5,
            ],
            [
                'name' => 'Watermelon',
                'image' => 'images/fruit/แตงโม.jpg', // Corrected path
                'category_id' => 2,
                'description' => 'Juicy watermelon',
                'price' => 25,
                'stock_quantity' => 30,
                'popularity' => 5,
            ],
            [
                'name' => 'Ganyao Durian',
                'image' => 'images/fruit/ทุเรียน.jpg', // Corrected path
                'category_id' => 2,
                'description' => 'But we have cut off the stems.',
                'price' => 40,
                'stock_quantity' => 15,
                'popularity' => 3,
            ],
            [
                'name' => 'Chanee Durian',
                'image' => 'images/fruit/ทุเรียนชะนี.jpg', // Corrected path
                'category_id' => 2,
                'description' => 'Gibbons are apes in the family Hylobatidae (/ˌhaɪləˈbætɪdiː/). The family historically contained one genus, but now is split into four extant genera and 20 species. ',
                'price' => 45,
                'stock_quantity' => 10,
                'popularity' => 3,
            ],
            [
                'name' => 'Monthong Durian',
                'image' => 'images/fruit/ทุเรียนหมอนทอง.jpg', // Corrected path
                'category_id' => 2,
                'description' => 'If you use it for your sleeping, you never wake up agian.',
                'price' => 50,
                'stock_quantity' => 25,
                'popularity' => 3,
            ],
            [
                'name' => 'Blueberry',
                'image' => 'images/fruit/บลูเบอรี่.jpg', // Corrected path
                'category_id' => 2,
                'description' => 'Fresh blueberries',
                'price' => 35,
                'stock_quantity' => 50,
                'popularity' => 4,
            ],
            [
                'name' => 'Guava',
                'image' => 'images/fruit/ฝรั่ง.jpg', // Corrected path
                'category_id' => 2,
                'description' => 'Guava is a common tropical fruit cultivated in many tropical and subtropical regions.',
                'price' => 25,
                'stock_quantity' => 50,
                'popularity' => 4,
            ],
            [
                'name' => 'Coconut',
                'image' => 'images/fruit/มะพร้าว.jpg', // Corrected path
                'category_id' => 2,
                'description' => 'The capybara or greater capybara (Hydrochoerus hydrochaeris) is the largest living rodent , native to South America. It is a member of the genus Hydrochoerus. The only other extant member is the lesser capybara (Hydrochoerus isthmius).',
                'price' => 50,
                'stock_quantity' => 40,
                'popularity' => 3,
            ],
            [
                'name' => 'Kaeo Khamin SiThong Mango',
                'image' => 'images/fruit/มะม่วงแก้วขมิ้นสีทอง.jpg', // Corrected path
                'category_id' => 2,
                'description' => 'Golden turmeric glass',
                'price' => 30,
                'stock_quantity' => 70,
                'popularity' => 4,
            ],
            [
                'name' => 'Nam Dok Mai Mango',
                'image' => 'images/fruit/มะม่วงน้ำดอกไม้.jpg', // Corrected path
                'category_id' => 2,
                'description' => 'It is a mango grown and watered with flower nectar.',
                'price' => 60,
                'stock_quantity' => 60,
                'popularity' => 5,
            ],
            [
                'name' => 'Keo Savoy Mango',
                'image' => 'images/fruit/มะม่วงเขียวเสวย.jpg', // Corrected path
                'category_id' => 2,
                'description' => 'MANGO Canvas',
                'price' => 20,
                'stock_quantity' => 60,
                'popularity' => 5,
            ],
            [
                'name' => 'Okrong Mango',
                'image' => 'images/fruit/มะม่วงอกร่อง.jpg', // Corrected path
                'category_id' => 2,
                'description' => 'chest rift mango',
                'price' => 500,
                'stock_quantity' => 2,
                'popularity' => 1,
            ],
            [
                'name' => 'Papaya',
                'image' => 'images/fruit/มะละกอ.jpg', // Corrected path
                'category_id' => 2,
                'description' => 'Papaya pok pok',
                'price' => 25,
                'stock_quantity' => 70,
                'popularity' => 4,
            ],
            [
                'name' => 'Mangosteen',
                'image' => 'images/fruit/มังคุด.jpg', // Corrected path
                'category_id' => 2,
                'description' => 'Mangosteen is not mango. Queen of fruit',
                'price' => 50,
                'stock_quantity' => 30,
                'popularity' => 3,
            ],
            [
                'name' => 'Longkong',
                'image' => 'images/fruit/ลองกอง.jpg', // Corrected path
                'category_id' => 2,
                'description' => 'Longkong not Longan',
                'price' => 30,
                'stock_quantity' => 40,
                'popularity' => 3,
            ],
            [
                'name' => 'Strawberry',
                'image' => 'images/fruit/สตอเบอร์รี่.jpg', // Corrected path
                'category_id' => 2,
                'description' => 'The garden strawberry (or simply strawberry; Fragaria × ananassa) is a widely grown hybrid species of the genus Fragaria in the rose family, Rosaceae, collectively known as the strawberries, which are cultivated worldwide for their fruit.',
                'price' => 30,
                'stock_quantity' => 20,
                'popularity' => 5,
            ],
            [
                'name' => 'Honey Murcott Orange',
                'image' => 'images/fruit/ส้มฮันนี่เมอคอท.jpg', // Corrected path
                'category_id' => 2,
                'description' => 'The Murcott orange is a unique and delectable citrus fruit that captivates taste buds with its vibrant flavor and refreshing aroma. ',
                'price' => 40,
                'stock_quantity' => 40,
                'popularity' => 5,
            ],
            [
                'name' => 'Pineapple',
                'image' => 'images/fruit/สับปะรด.jpg', // Corrected path
                'category_id' => 2,
                'description' => 'I have a pen I have pineapple Ah, pineapple pen!!',
                'price' => 45,
                'stock_quantity' => 50,
                'popularity' => 3,
            ],
            [
                'name' => 'Gloden asian pear',
                'image' => 'images/fruit/สาลี่ทอง.jpg', // Corrected path
                'category_id' => 2,
                'description' => 'The flesh is white and crisp, with a sweet flavor similar to apples and pears.',
                'price' => 25,
                'stock_quantity' => 60,
                'popularity' => 3,
            ],
            [
                'name' => 'Passion Fruit',
                'image' => 'images/fruit/เสาวรส.jpg', // Corrected path
                'category_id' => 2,
                'description' => 'This fruit has a passion than my entire life',
                'price' => 22,
                'stock_quantity' => 40,
                'popularity' => 3,
            ],
            [
                'name' => 'Grapes',
                'image' => 'images/fruit/องุ่น.jpg', // Corrected path
                'category_id' => 2,
                'description' => 'Seedless grapes',
                'price' => 60,
                'stock_quantity' => 120,
                'popularity' => 5,
            ],
            [
                'name' => 'Avocado',
                'image' => 'images/fruit/อะโวคาโด.jpg',
                'category_id' => 2,
                'description' => 'avocado for diet ',
                'price' => 50,
                'stock_quantity' => 100,
                'popularity' => 5,
            ],
            [
                'name' => 'Red apple',
                'image' => 'images/fruit/แอปเปิลแดง.jpg',
                'category_id' => 2,
                'description' => 'premium bitten red apple ',
                'price' => 100,
                'stock_quantity' => 10,
                'popularity' => 5,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}