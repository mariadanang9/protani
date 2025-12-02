<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Dummy data produk pertanian
    private function getDummyProducts()
    {
        $categories = ['Sayuran', 'Buah', 'Biji-bijian', 'Rempah'];
        $products = [
            ['name' => 'Tomat Organik', 'category' => 'Sayuran', 'price_min' => 15000, 'price_max' => 25000],
            ['name' => 'Cabai Merah Keriting', 'category' => 'Sayuran', 'price_min' => 30000, 'price_max' => 50000],
            ['name' => 'Bawang Merah', 'category' => 'Sayuran', 'price_min' => 35000, 'price_max' => 45000],
            ['name' => 'Kentang', 'category' => 'Sayuran', 'price_min' => 12000, 'price_max' => 18000],
            ['name' => 'Wortel', 'category' => 'Sayuran', 'price_min' => 10000, 'price_max' => 15000],
            ['name' => 'Jeruk Medan', 'category' => 'Buah', 'price_min' => 20000, 'price_max' => 30000],
            ['name' => 'Apel Malang', 'category' => 'Buah', 'price_min' => 25000, 'price_max' => 35000],
            ['name' => 'Pisang Cavendish', 'category' => 'Buah', 'price_min' => 15000, 'price_max' => 20000],
            ['name' => 'Mangga Gedong', 'category' => 'Buah', 'price_min' => 18000, 'price_max' => 28000],
            ['name' => 'Pepaya California', 'category' => 'Buah', 'price_min' => 12000, 'price_max' => 18000],
            ['name' => 'Beras Premium', 'category' => 'Biji-bijian', 'price_min' => 12000, 'price_max' => 15000],
            ['name' => 'Jagung Manis', 'category' => 'Biji-bijian', 'price_min' => 8000, 'price_max' => 12000],
            ['name' => 'Kedelai Lokal', 'category' => 'Biji-bijian', 'price_min' => 10000, 'price_max' => 14000],
            ['name' => 'Kacang Tanah', 'category' => 'Biji-bijian', 'price_min' => 20000, 'price_max' => 30000],
            ['name' => 'Gandum', 'category' => 'Biji-bijian', 'price_min' => 15000, 'price_max' => 25000],
            ['name' => 'Jahe Merah', 'category' => 'Rempah', 'price_min' => 25000, 'price_max' => 40000],
            ['name' => 'Kunyit', 'category' => 'Rempah', 'price_min' => 18000, 'price_max' => 25000],
            ['name' => 'Lengkuas', 'category' => 'Rempah', 'price_min' => 15000, 'price_max' => 22000],
            ['name' => 'Serai', 'category' => 'Rempah', 'price_min' => 10000, 'price_max' => 15000],
            ['name' => 'Daun Salam', 'category' => 'Rempah', 'price_min' => 5000, 'price_max' => 10000],
        ];

        $result = [];
        foreach ($products as $index => $product) {
            $result[] = [
                'id' => $index + 1,
                'name' => $product['name'],
                'description' => 'Produk pertanian berkualitas tinggi dari petani lokal Indonesia. ' . $product['name'] . ' dipanen segar dan siap untuk didistribusikan.',
                'price' => rand($product['price_min'], $product['price_max']),
                'category' => $product['category']
            ];
        }

        return $result;
    }

    public function index()
    {
        $products = $this->getDummyProducts();
        return view('products.list', compact('products'));
    }

    public function create()
    {
        return view('products.form', ['product' => null]);
    }

    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0'
        ]);

        // Simulasi berhasil menyimpan
        return redirect()->route('products')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function show($id)
    {
        $products = $this->getDummyProducts();
        $product = collect($products)->firstWhere('id', $id);

        if (!$product) {
            abort(404);
        }

        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $products = $this->getDummyProducts();
        $product = collect($products)->firstWhere('id', $id);

        if (!$product) {
            abort(404);
        }

        return view('products.form', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0'
        ]);

        // Simulasi berhasil update
        return redirect()->route('products')->with('success', 'Produk berhasil diperbarui!');
    }
}
