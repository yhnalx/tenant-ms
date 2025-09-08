<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports'); // main menu page (resources/views/reports.blade.php)
    }

    // 1. Tenant List Report
    public function tenantList()
    {
        $conn = DB::connection()->getPdo();
        $stmt = $conn->prepare("
            SELECT 
                t.id AS id,
                t.name AS name,
                t.email AS email,
                p.pro_type AS property_type,
                p.pro_room_number AS room_number,
                l.lea_status AS status
            FROM tbl_lease l
            JOIN users t ON l.user_id = t.id
            JOIN tbl_property p ON l.pro_id = p.pro_id
            WHERE CURDATE() BETWEEN l.lea_start_date AND l.lea_end_date
        ");
        $stmt->execute();
        $tenants = $stmt->fetchAll(\PDO::FETCH_OBJ);

        $month = date('F');
        $year = date('Y');

        return view('report.tenant_list', compact('tenants','month','year'));
    }

    // 2. Payment Report
    public function paymentReport()
    {
        $conn = DB::connection()->getPdo();
        $stmt = $conn->prepare("
            SELECT 
                pay.pay_id AS id,
                t.name AS tenant_name,
                CONCAT('₱', FORMAT(pay.pay_amount,2)) AS amount,
                DATE_FORMAT(pay.pay_date, '%M %d, %Y') AS payment_date,
                pay.pay_method AS method
            FROM tbl_payment pay
            JOIN tbl_lease l ON pay.lea_id = l.lea_id
            JOIN users t ON l.user_id = t.id
            JOIN tbl_property p ON l.pro_id = p.pro_id
        ");
        $stmt->execute();
        $payments = $stmt->fetchAll(\PDO::FETCH_OBJ);

        $month = date('F');
        $year = date('Y');

        return view('report.payments', compact('payments','month','year'));
    }

    // 3. Active Leases Report
    public function leaseReport()
    {
        $conn = DB::connection()->getPdo();
        $stmt = $conn->prepare("
            SELECT 
                l.lea_id AS id,
                t.name AS tenant_name,
                p.pro_type AS property_type,
                p.pro_room_number AS room_number,
                l.lea_status AS status
            FROM tbl_lease l
            JOIN users t ON l.user_id = t.id
            JOIN tbl_property p ON l.pro_id = p.pro_id
            WHERE l.lea_status = 'Active'
        ");
        $stmt->execute();
        $active_leases = $stmt->fetchAll(\PDO::FETCH_OBJ);

        $month = date('F');
        $year = date('Y');

        return view('report.active_lease', compact('active_leases','month','year'));
    }

    // 4. Deposit Report
    public function depositReport()
    {
        $conn = DB::connection()->getPdo();
        $stmt = $conn->prepare("
            SELECT 
                d.dep_id AS id,
                t.name AS tenant_name,
                CONCAT('₱', FORMAT(d.dep_amount,2)) AS amount,
                DATE_FORMAT(d.dep_date_paid, '%M %d, %Y') AS deposit_date
            FROM tbl_deposit d
            JOIN tbl_lease l ON d.lea_id = l.lea_id
            JOIN users t ON l.user_id = t.id
        ");
        $stmt->execute();
        $deposits = $stmt->fetchAll(\PDO::FETCH_OBJ);

        $month = date('F');
        $year = date('Y');

        return view('report.deposits', compact('deposits','month','year'));
    }

    // 5. Maintenance Report
    public function maintenanceReport()
    {
        $conn = DB::connection()->getPdo();
        $stmt = $conn->prepare("
            SELECT 
                m.mai_id AS id,
                t.name AS tenant_name,
                p.pro_type AS property_type,
                m.mai_description AS request_details,
                m.mai_status AS status,
                DATE_FORMAT(m.mai_request_date, '%M %d, %Y') AS created_at
            FROM tbl_maintenancerequest m
            JOIN tbl_lease l ON m.lea_id = l.lea_id
            JOIN users t ON l.user_id = t.id
            JOIN tbl_property p ON l.pro_id = p.pro_id
        ");
        $stmt->execute();
        $maintenances = $stmt->fetchAll(\PDO::FETCH_OBJ);

        $month = date('F');
        $year = date('Y');

        return view('report.maintenance', compact('maintenances','month','year'));
    }

    // 6. Occupancy Report
    public function occupancyReport()
    {
        $conn = DB::connection()->getPdo();
        $stmt = $conn->prepare("
            SELECT 
                p.pro_type AS property_type,
                p.pro_room_number AS room_number,
                t.name AS tenant_name,
                l.lea_status AS status
            FROM tbl_property p
            LEFT JOIN tbl_lease l ON l.pro_id = p.pro_id
            LEFT JOIN users t ON l.user_id = t.id
        ");
        $stmt->execute();
        $occupancies = $stmt->fetchAll(\PDO::FETCH_OBJ);

        $month = date('F');
        $year = date('Y');

        return view('report.occupancy', compact('occupancies','month','year'));
    }

    // 7. Expiring Leases Report
    public function expiringLeases()
    {
        $conn = DB::connection()->getPdo();
        $stmt = $conn->prepare("
            SELECT 
                l.lea_id AS id,
                t.name AS tenant_name,
                p.pro_type AS property_type,
                p.pro_room_number AS room_number,
                DATE_FORMAT(l.lea_end_date, '%M %d, %Y') AS end_date
            FROM tbl_lease l
            JOIN users t ON l.user_id = t.id
            JOIN tbl_property p ON l.pro_id = p.pro_id
            WHERE l.lea_end_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 30 DAY)
        ");
        $stmt->execute();
        $expiring_leases = $stmt->fetchAll(\PDO::FETCH_OBJ);

        $month = date('F');
        $year = date('Y');

        return view('report.expiring_lease', compact('expiring_leases','month','year'));
    }

    // 8. Financial Report
    public function financialReport()
    {
        $conn = DB::connection()->getPdo();
        $stmt = $conn->prepare("
            SELECT 
                t.name AS tenant_name,
                CONCAT('₱', FORMAT(IFNULL(SUM(pay.pay_amount),0),2)) AS total_payments,
                CONCAT('₱', FORMAT(IFNULL(SUM(d.dep_amount),0),2)) AS total_deposits,
                CONCAT('₱', FORMAT((IFNULL(SUM(pay.pay_amount),0) - IFNULL(SUM(d.dep_amount),0)),2)) AS balance
            FROM users t
            LEFT JOIN tbl_lease l ON t.id = l.user_id
            LEFT JOIN tbl_payment pay ON l.lea_id = pay.lea_id
            LEFT JOIN tbl_deposit d ON l.lea_id = d.lea_id
            GROUP BY t.id, t.name
        ");
        $stmt->execute();
        $financials = $stmt->fetchAll(\PDO::FETCH_OBJ);

        $month = date('F');
        $year = date('Y');

        return view('report.financial', compact('financials','month','year'));
    }

    // 9. Delinquent Payments Report
    public function delinquentPayments()
    {
        $conn = DB::connection()->getPdo();
        $stmt = $conn->prepare("
            SELECT 
                t.name AS tenant_name,
                CONCAT('₱', FORMAT(pay.pay_amount,2)) AS amount_due,
                DATE_FORMAT(pay.pay_date, '%M %d, %Y') AS due_date
            FROM tbl_payment pay
            JOIN tbl_lease l ON pay.lea_id = l.lea_id
            JOIN users t ON l.user_id = t.id
            WHERE pay.pay_status = 'Unpaid'
               OR pay.pay_date > STR_TO_DATE(CONCAT(YEAR(pay.pay_date), '-', MONTH(pay.pay_date), '-', DAY(l.lea_start_date)), '%Y-%m-%d')
        ");
        $stmt->execute();
        $delinquents = $stmt->fetchAll(\PDO::FETCH_OBJ);

        $month = date('F');
        $year = date('Y');

        return view('report.delinquent_payments', compact('delinquents','month','year'));
    }
}
