<?php

namespace App\Services\statistics;

use App\Models\User;
use Carbon\Carbon;

class UserStatisticsService {
    // Total number of users
    public function getTotalUsers() {
        return User::count();
    }

    // Number of active users (e.g., logged in within the last 30 days)
    public function getActiveUsers($days = 30) {
       // return User::where('last_login_at', '>=', Carbon::now()->subDays($days))->count();
    }

    // Number of inactive users (e.g., not logged in within the last 30 days)
    public function getInactiveUsers($days = 30) {
       // return User::where('last_login_at', '<', Carbon::now()->subDays($days))->orWhereNull('last_login_at')->count();
    }

    // Number of users by role (if you have a role column or relationship)
    public function getUsersByRole($role) {
        return User::where('role', $role)->count();
    }

    // Number of users registered in the last N days
    public function getRecentUsers($days = 30) {
        return User::where('created_at', '>=', Carbon::now()->subDays($days))->count();
    }

    // Average number of users registered per month
    public function getAverageUsersPerMonth() {
        $totalUsers = $this->getTotalUsers();
        $monthsSinceFirstUser = Carbon::now()->diffInMonths(User::oldest()->first()->created_at);
        return $monthsSinceFirstUser > 0 ? $totalUsers / $monthsSinceFirstUser : 0;
    }

    // Top N users by activity (if you have a login count or last login timestamp)
    public function getTopActiveUsers($limit = 5) {
        // return User::orderByDesc('last_login_at')
        //            ->limit($limit)
        //            ->get();
    }
}