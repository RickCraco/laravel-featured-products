<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class UpdateFeaturedProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:update-featured';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Aggiorna l\'attributo "featured" a true per 5 prodotti casuali.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Imposta tutti i prodotti featured a false
        Product::where('featured', true)->update(['featured' => false]);

        // Seleziona 5 prodotti casuali
        $products = Product::all()->random(5);

        // Aggiorna i prodotti selezionati
        foreach ($products as $product) {
            $product->featured = true;
            $product->save();
        }

        $this->info('5 prodotti sono stati aggiornati con "featured" a true.');

        return 0;
    }
}
