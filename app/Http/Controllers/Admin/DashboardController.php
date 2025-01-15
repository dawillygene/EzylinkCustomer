<?php

namespace App\Http\Controllers\Admin;


use App\Services\OrderService;
use App\Services\ProductService;
use Illuminate\Routing\Controller;
use App\Services\statistics\UserStatisticsService;
use App\Services\statistics\OrderStatisticsService;
use App\Services\statistics\ProductStatisticsService;

class DashboardController extends Controller
{
    protected $productService;
    protected $orderStatisticsService;
    protected $productStatisticsService;
    protected $userStatisticsService;
    protected $orderService;

    public function __construct(OrderService $orderService,ProductService $productService,OrderStatisticsService $orderStatisticsService,ProductStatisticsService $productStatisticsService,UserStatisticsService $userStatisticsService)
    {
        $this->productService = $productService;
        $this->orderService = $orderService;
        $this->orderStatisticsService = $orderStatisticsService;
        $this->productStatisticsService = $productStatisticsService;
        $this->userStatisticsService = $userStatisticsService;
    }
    public function index()
    {
      
      
        $statistics = [

            'totalRevenue' => $this->orderStatisticsService->getTotalRevenue(),
            'averageOrderValue' => $this->orderStatisticsService->getAverageOrderValue(),
           
            'totalProducts' => $this->productStatisticsService->getTotalProducts(),
            'activeUsers' => $this->userStatisticsService->getActiveUsers(),
            'inactiveUsers' => $this->userStatisticsService->getInactiveUsers(),
            'recentUsers' => $this->userStatisticsService->getRecentUsers(),


            //ORDERS HANDLING
            'totalOrders' => $this->orderStatisticsService->getTotalOrders(),
            // 'ordersLast30Days' => $this->orderStatisticsService->getOrdersForPeriod(30),
            // 'completedOrders' => $this->orderStatisticsService->getOrdersByStatus('completed'),
            // 'revenueLast30Days' => $this->orderStatisticsService->getRevenueForPeriod(30),
            // 'topUsers' => $this->orderStatisticsService->getTopUsersBySpending(5),


            // 'averageProductPrice' => $this->productStatisticsService->getAverageProductPrice(),
            // 'lowStockProducts' => $this->productStatisticsService->getLowStockProducts(),
            // 'totalStockValue' => $this->productStatisticsService->getTotalStockValue(),
            // 'topProductsByStock' => $this->productStatisticsService->getTopProductsByStock(5),
            // 'topProductsByPrice' => $this->productStatisticsService->getTopProductsByPrice(5),
            
           
           //USERS HANDLING
            'totalUsers' => $this->userStatisticsService->getTotalUsers(),
            // 'averageUsersPerMonth' => $this->userStatisticsService->getAverageUsersPerMonth(),
            // 'topActiveUsers' => $this->userStatisticsService->getTopActiveUsers(5),
        ];

        $recentOrders = $this->orderService->getCurrentOrders(['pending', 'processing']);
        $topSellingProducts = $this->productService->topSaleProduct();
        
    
        $responseData = [
            'statistics' => $statistics,
            'topSellingProducts' => $topSellingProducts,
            'recentOrders' => $recentOrders,
        ];
    
        return response()->json($responseData, 200);

   
    }
}
