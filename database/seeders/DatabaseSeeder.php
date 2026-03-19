<?php

namespace Database\Seeders;

use App\Models\GeneralSetting;
use App\Models\Newsletter;
use App\Models\Portfolio;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        GeneralSetting::updateOrCreate([
            'id' => 1,
        ], [
            'site_name' => 'CodeExpress',
            'tagline' => 'Digital solutions with speed and precision.',
            'email' => 'info@codeexpress.net',
            'phone' => '+8801344720466',
            'address' => 'Dhaka, Bangladesh',
            'facebook' => null,
            'linkedin' => null,
            'instagram' => null,
            'youtube' => null,
        ]);

        User::updateOrCreate([
            'email' => 'admin@codeexpress.test',
        ], [
            'name' => 'CodeExpress Admin',
            'email_verified_at' => Carbon::now(),
            'password' => 'password',
        ]);

        $portfolios = [
            ['title' => 'Learning Management System', 'slug' => 'learning-management-system', 'category' => 'Education Product', 'icon' => '&#9998;', 'short_description' => 'A digital learning platform for courses, assessments, progress tracking, and student communication.', 'excerpt_note' => 'Built for structured digital learning delivery', 'overview' => 'A scalable LMS designed for institutions and training teams that need content delivery, learner progress visibility, and a cleaner digital classroom experience with measurable engagement.', 'thumbnail' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=900&q=80', 'thumbnail_alt' => 'Students collaborating with digital learning tools', 'industry' => 'Education', 'client_name' => 'Training Platform', 'project_date' => '2026-01-15', 'tags' => ['Courses', 'Assessments', 'Student portal'], 'key_features' => ['Modular course delivery with role-based access', 'Integrated assessments and learner tracking', 'Clean instructor and student dashboards'], 'results' => ['Improves learning continuity across distributed users', 'Makes progress and participation visible in one place', 'Supports structured digital education workflows'], 'sort_order' => 1, 'is_featured' => true, 'is_published' => true],
            ['title' => 'Restaurant Management System', 'slug' => 'restaurant-management-system', 'category' => 'Restaurant Product', 'icon' => '&#127869;', 'short_description' => 'An integrated restaurant solution for menu management, table service, kitchen flow, and order tracking.', 'excerpt_note' => 'Designed for smoother service operations', 'overview' => 'A service-focused restaurant platform built to reduce order friction, improve front-of-house coordination, and keep kitchen operations visible in real time.', 'thumbnail' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=900&q=80', 'thumbnail_alt' => 'Restaurant team using a digital ordering and management system', 'industry' => 'Hospitality', 'client_name' => 'Restaurant Group', 'project_date' => '2025-12-10', 'tags' => ['POS', 'Kitchen queue', 'Order flow'], 'key_features' => ['Digitized table and order lifecycle', 'Kitchen queue management for faster handoff', 'Central menu and billing workflow'], 'results' => ['Reduces manual coordination between service roles', 'Creates better order visibility during peak times', 'Supports faster service turnaround'], 'sort_order' => 2, 'is_featured' => false, 'is_published' => true],
            ['title' => 'Ecommerce Solution', 'slug' => 'ecommerce-solution', 'category' => 'Commerce Product', 'icon' => '&#128722;', 'short_description' => 'A scalable online commerce platform for catalog management, orders, payments, and customer accounts.', 'excerpt_note' => 'Built for modern digital retail experiences', 'overview' => 'A commerce platform designed for digital storefronts that need a dependable catalog, order processing flow, customer account management, and conversion-minded user journeys.', 'thumbnail' => 'https://images.unsplash.com/photo-1556740749-887f6717d7e4?auto=format&fit=crop&w=900&q=80', 'thumbnail_alt' => 'Customer browsing products in an e-commerce interface', 'industry' => 'Retail', 'client_name' => 'Digital Storefront', 'project_date' => '2025-11-18', 'tags' => ['Catalog', 'Payments', 'Customer portal'], 'key_features' => ['Flexible product catalog structure', 'Order and payment pipeline visibility', 'Customer account and purchase history workflows'], 'results' => ['Supports cleaner online sales operations', 'Improves customer self-service', 'Builds a stronger retail delivery foundation'], 'sort_order' => 3, 'is_featured' => false, 'is_published' => true],
            ['title' => 'Accounting & Invoicing System', 'slug' => 'accounting-invoicing-system', 'category' => 'Finance Product', 'icon' => '&#128179;', 'short_description' => 'A financial operations product covering invoices, payments, ledger tracking, and reporting visibility.', 'excerpt_note' => 'Built for cleaner financial control', 'overview' => 'A finance system aimed at organizations that need stronger control over invoices, payments, transaction records, and operational reporting from one structured environment.', 'thumbnail' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&w=900&q=80', 'thumbnail_alt' => 'Accounting workspace with invoices and financial reporting screens', 'industry' => 'Finance Operations', 'client_name' => 'Business Services Team', 'project_date' => '2025-10-08', 'tags' => ['Invoices', 'Payments', 'Finance reports'], 'key_features' => ['Invoice lifecycle tracking', 'Payment visibility and ledger organization', 'Reporting dashboards for financial review'], 'results' => ['Strengthens operational finance accuracy', 'Improves billing control and transparency', 'Reduces fragmented reporting effort'], 'sort_order' => 4, 'is_featured' => false, 'is_published' => true],
            ['title' => 'HR & Payroll Platform', 'slug' => 'hr-payroll-platform', 'category' => 'People Product', 'icon' => '&#128188;', 'short_description' => 'A workforce platform for employee records, attendance, payroll processing, and leave management.', 'excerpt_note' => 'Built to simplify internal people operations', 'overview' => 'A people operations platform built to centralize workforce records, attendance, payroll processing, and leave handling for organizations with growing operational complexity.', 'thumbnail' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&w=900&q=80', 'thumbnail_alt' => 'HR team managing payroll and people records on a digital system', 'industry' => 'HR Operations', 'client_name' => 'Internal Workforce Team', 'project_date' => '2025-09-14', 'tags' => ['HR records', 'Payroll', 'Attendance'], 'key_features' => ['Employee master data management', 'Attendance and leave workflows', 'Payroll-ready monthly processing visibility'], 'results' => ['Simplifies recurring HR administration', 'Improves workforce record consistency', 'Brings payroll support into one operational flow'], 'sort_order' => 5, 'is_featured' => false, 'is_published' => true],
            ['title' => 'Inventory & Warehouse System', 'slug' => 'inventory-warehouse-system', 'category' => 'Operations Product', 'icon' => '&#128230;', 'short_description' => 'A stock and warehouse management product for item control, movement tracking, and supply visibility.', 'excerpt_note' => 'Built for reliable operational traceability', 'overview' => 'A warehouse operations system designed to track stock movement, improve item visibility, and reduce uncertainty across inbound, outbound, and internal inventory workflows.', 'thumbnail' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=900&q=80', 'thumbnail_alt' => 'Warehouse inventory and logistics operations managed digitally', 'industry' => 'Supply Chain', 'client_name' => 'Warehouse Operations', 'project_date' => '2025-08-06', 'tags' => ['Inventory', 'Stock movement', 'Warehouse ops'], 'key_features' => ['Central item and stock visibility', 'Movement logs across warehouse processes', 'Operational traceability for inventory handling'], 'results' => ['Improves supply visibility and accountability', 'Creates a more dependable inventory control flow', 'Supports operational traceability at scale'], 'sort_order' => 6, 'is_featured' => false, 'is_published' => true],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::updateOrCreate(['slug' => $portfolio['slug']], $portfolio);
        }

        $newsletters = [
            ['title' => 'Designing software around real operational workflows', 'slug' => 'designing-software-around-real-operational-workflows', 'category' => 'Product Update', 'excerpt' => 'A short look at how workflow mapping improves product clarity, usability, and delivery outcomes.', 'content' => 'Operationally strong software begins with understanding how teams actually work. This article explains how workflow mapping creates better product scoping, cleaner interfaces, and a more grounded delivery path from concept to launch.', 'image' => 'https://images.unsplash.com/photo-1516321165247-4aa89a48be28?auto=format&fit=crop&w=900&q=80', 'image_alt' => 'Team reviewing digital product strategy and content planning', 'published_at' => '2026-03-12 09:00:00', 'sort_order' => 1, 'is_published' => true],
            ['title' => 'Why reporting dashboards fail without decision context', 'slug' => 'why-reporting-dashboards-fail-without-decision-context', 'category' => 'Insight', 'excerpt' => 'Better dashboards come from understanding the decisions teams need to make, not only the data they store.', 'content' => 'Dashboards are only useful when they support decisions. This article explores how reporting tools should be designed around operational questions, role-specific visibility, and the actions teams actually need to take.', 'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=900&q=80', 'image_alt' => 'Analytics dashboard and reporting interface on a laptop screen', 'published_at' => '2026-03-10 09:00:00', 'sort_order' => 2, 'is_published' => true],
            ['title' => 'Modernizing business platforms without breaking continuity', 'slug' => 'modernizing-business-platforms-without-breaking-continuity', 'category' => 'Engineering', 'excerpt' => 'A practical view on upgrading legacy systems while preserving service continuity and long-term maintainability.', 'content' => 'Modernization is strongest when continuity is protected. This article outlines how platform upgrades can improve maintainability, performance, and usability without destabilizing the workflows teams already depend on.', 'image' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=900&q=80', 'image_alt' => 'Developers working on a modern software platform', 'published_at' => '2026-03-08 09:00:00', 'sort_order' => 3, 'is_published' => true],
        ];

        foreach ($newsletters as $newsletter) {
            Newsletter::updateOrCreate(['slug' => $newsletter['slug']], $newsletter);
        }
    }
}