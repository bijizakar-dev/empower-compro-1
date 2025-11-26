<?php

namespace App\Controllers;

use App\Models\Masterdata\Service;
use App\Models\Masterdata\PriceList;
use App\Models\Masterdata\PortfolioCategory;
use App\Models\Masterdata\Portfolio;
use App\Models\Masterdata\PortfolioMedia;
use App\Models\System\Setting;
use App\Models\Masterdata\Team;


class Home extends BaseController
{
    public function getDashboardAdmin()
    {
        return view('home-admin');
    }

    public function getMain() {

        $serviceModel   = new Service();
        $priceListModel = new PriceList();
        $portfolioModel = new Portfolio();
        $categoryModel  = new PortfolioCategory();
        $mediaModel     = new PortfolioMedia();
        $settingModel   = new Setting();
        $teamModel      = new Team();


        $services   = $serviceModel->where('active', 1)->orderBy('sort_order', 'ASC')->findAll();
        $pricelists = $priceListModel->findAll();
        $categories = $categoryModel->orderBy('name', 'ASC')->findAll();

        $setting = $settingModel->first();

        // Ambil portfolio + join kategori
        $portfolios = $portfolioModel
            ->select('portfolio.*, portfolio_categories.name AS category_name')
            ->join('portfolio_categories', 'portfolio_categories.id = portfolio.category_id')
            ->orderBy('portfolio.id', 'DESC')
            ->findAll();

        // Loop untuk mengambil media masing-masing portfolio
        foreach ($portfolios as &$p) {
            $p->media = $mediaModel
                ->where('portfolio_id', $p->id)
                ->orderBy('id', 'ASC')
                ->findAll();
        }

        $teams = $teamModel->orderBy('id', 'ASC')->findAll();

        $data = [
            'title'         => 'Empower Compro',
            'services'      => $services,
            'pricelists'    => $pricelists,
            'categories'    => $categories,
            'portfolios'    => $portfolios,
            'setting'       => $setting,
            'open_hours'    => [
                'days' => 'Setiap Hari',
                'time' => '07:00 - 22:00 WIB'
            ],
            'teams'         => $teams
        ];

        return view('main', $data);
    }
}
