<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        // Sample data with longer descriptions
        $products = [
            ['name' => 'Pizza', 'description' => 'Delicious pizza topped with mozzarella cheese, pepperoni, and fresh vegetables. Baked to perfection in a wood-fired oven.', 'quantity' => 10, 'price' => 9.99, 'image_filepath' => 'pizza.jpg'],
            ['name' => 'Burger', 'description' => 'Juicy beef patty served on a toasted sesame seed bun with crisp lettuce, ripe tomatoes, melted cheese, and tangy pickles. Accompanied by golden fries on the side.', 'quantity' => 20, 'price' => 8.49, 'image_filepath' => 'burger.jpg'],
            ['name' => 'Pasta', 'description' => 'Al dente spaghetti tossed in a rich marinara sauce, garnished with freshly grated Parmesan cheese and fragrant basil leaves. Served with warm garlic breadsticks.', 'quantity' => 15, 'price' => 12.99,'image_filepath' => 'pasta.jpg'],
            ['name' => 'Salad', 'description' => 'Fresh mixed greens, cherry tomatoes, cucumber slices, shredded carrots, and red onion rings, all tossed in a zesty vinaigrette dressing. A healthy and refreshing choice.', 'quantity' => 12, 'price' => 7.99,'image_filepath' => 'salad.jpg'],
            ['name' => 'Sushi', 'description' => 'Assorted sushi rolls featuring tender slices of raw fish, creamy avocado, and crunchy tempura bits, wrapped in delicate seaweed and seasoned rice. Served with soy sauce and wasabi.', 'quantity' => 18, 'price' => 15.99,'image_filepath' => 'sushi.jpg'],
            ['name' => 'Tacos', 'description' => 'Soft corn tortillas filled with savory seasoned ground beef, crisp lettuce, diced tomatoes, shredded cheese, and tangy salsa. A classic Mexican dish bursting with flavor.', 'quantity' => 14, 'price' => 10.49,'image_filepath' => 'tacos.jpg'],
            ['name' => 'Steak', 'description' => 'Juicy grilled steak cooked to your preference, seasoned with a blend of herbs and spices. Served with garlic mashed potatoes and grilled asparagus spears.', 'quantity' => 8, 'price' => 19.99,'image_filepath' => 'steak.jpg'],
            ['name' => 'Soup', 'description' => 'Hearty soup made with tender chunks of chicken, fresh vegetables, and aromatic herbs, simmered to perfection in a savory broth. Served with crusty bread for dipping.', 'quantity' => 10, 'price' => 6.99,'image_filepath' => 'soup.jpg'],
            ['name' => 'Sandwich', 'description' => 'A mouthwatering sandwich featuring layers of thinly sliced roast beef, melted Swiss cheese, caramelized onions, and tangy mustard, all stacked between slices of toasted rye bread.', 'quantity' => 16, 'price' => 8.99,'image_filepath' => ''],
            ['name' => 'Curry', 'description' => 'A fragrant curry dish made with tender pieces of chicken or vegetables, simmered in a creamy coconut milk sauce and seasoned with an array of spices. Served over steamed jasmine rice.', 'quantity' => 22, 'price' => 11.99,'image_filepath' => ''],
        ];

        // Insert data into the database
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
