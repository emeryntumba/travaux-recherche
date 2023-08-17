<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class SearchYearComponent extends Component
{
    public $year;
    public $results;

    public function mount()  {
        //$this->year = 2023;
    }

    public function search()
    {
        if ($this->year){
            $this->results = DB::table('travails')
            ->select([
                DB::raw('YEAR(`annee_publication`) as year'),
                DB::raw('COUNT(*) as total'),
                DB::raw('COUNT(CASE WHEN `type_travail` = "TFC" THEN 1 END) as TFC'),
                DB::raw('COUNT(CASE WHEN `type_travail` = "TFE" THEN 1 END) as TFE'),
                DB::raw('COUNT(CASE WHEN `type_travail` = "RS" THEN 1 END) as RS'),
                DB::raw('COUNT(CASE WHEN `type_travail` = "DEA" THEN 1 END) as DEA'),
                DB::raw('COUNT(CASE WHEN `type_travail` = "THESE" THEN 1 END) as THESE')
            ])
            ->whereYear('annee_publication', $this->year)
            ->groupBy(DB::raw('YEAR(`annee_publication`)'))
            ->get();
        }

        $this->reset('year');

    }

    public function render()
    {
        return view('livewire.search-year-component');
    }
}
