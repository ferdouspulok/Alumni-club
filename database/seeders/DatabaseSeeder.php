<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\MembershipType;
use App\Models\Member;
use App\Models\Committee;
use App\Models\CommitteeMember;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\NewsCategory;
use App\Models\News;
use App\Models\Notice;
use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Models\Document;
use App\Models\Page;
use App\Models\Setting;
use App\Models\MembershipPayment;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin Users
        $superAdmin = User::create([
            'name' => 'Super Administrator',
            'email' => 'admin@chatkhil.club',
            'phone' => '+8801819000001',
            'password' => Hash::make('password123'),
            'role' => 'super_admin',
            'status' => 'active',
        ]);

        $contentManager = User::create([
            'name' => 'Content Manager',
            'email' => 'content@chatkhil.club',
            'phone' => '+8801819000002',
            'password' => Hash::make('password123'),
            'role' => 'content_manager',
            'status' => 'active',
        ]);

        $memberManager = User::create([
            'name' => 'Membership Secretary',
            'email' => 'manager@chatkhil.club',
            'phone' => '+8801819000003',
            'password' => Hash::make('password123'),
            'role' => 'member_manager',
            'status' => 'active',
        ]);

        // Demo Member User
        $memberUser = User::create([
            'name' => 'Barrister Kamal Hossain Chowdhury',
            'email' => 'member@chatkhil.club',
            'phone' => '+8801711223344',
            'password' => Hash::make('password123'),
            'role' => 'member',
            'status' => 'active',
        ]);

        // 2. Membership Types
        $general = MembershipType::create([
            'name' => 'General Member',
            'slug' => 'general-member',
            'fee' => 10000.00,
            'validity_type' => 'annual',
            'description' => 'Standard annual membership granting access to all club gatherings, library, and sporting facilities.',
            'order_num' => 1,
            'status' => 'active',
        ]);

        $life = MembershipType::create([
            'name' => 'Life Member',
            'slug' => 'life-member',
            'fee' => 100000.00,
            'validity_type' => 'lifetime',
            'description' => 'Lifetime prestigious fellowship with perpetual voting rights, priority venue reservations, and lifetime club privileges.',
            'order_num' => 2,
            'status' => 'active',
        ]);

        $executive = MembershipType::create([
            'name' => 'Executive Member',
            'slug' => 'executive-member',
            'fee' => 35000.00,
            'validity_type' => 'annual',
            'description' => 'For active civic contributors participating in club leadership, planning committees, and governance.',
            'order_num' => 3,
            'status' => 'active',
        ]);

        $associate = MembershipType::create([
            'name' => 'Associate Member',
            'slug' => 'associate-member',
            'fee' => 5000.00,
            'validity_type' => 'annual',
            'description' => 'Special entry category for young professionals and youth leaders from Chatkhil upazila.',
            'order_num' => 4,
            'status' => 'active',
        ]);

        // 3. Settings
        $settings = [
            'site_name' => 'Chatkhil Elite Club Limited',
            'site_tagline' => 'United by Community, Driven by Excellence',
            'club_reg_no' => 'REG-NOA-CEC-2018/42',
            'club_established_year' => '2018',
            'club_address' => 'Elite Bhaban (2nd Floor), Main Road, Chatkhil Municipality, Noakhali - 3870, Bangladesh',
            'contact_phone' => '+880 1819-234567, +880 1711-890123',
            'contact_email' => 'info@chatkhileliteclub.com',
            'office_hours' => 'Saturday – Thursday: 10:00 AM – 09:00 PM (Friday Closed)',
            'facebook_url' => 'https://facebook.com/chatkhileliteclub',
            'youtube_url' => 'https://youtube.com',
            'linkedin_url' => 'https://linkedin.com',
            'map_iframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14691.002047391783!2d90.99955745!3d23.0483863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3754988bf2eb1bcf%3A0xb35a8df2cbbe460e!2sChatkhil%2C%20Bangladesh!5e0!3m2!1sen!2sbd!4v1700000000000!5m2!1sen!2sbd" width="100%" height="320" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'hero_title' => 'Chatkhil Elite Club Limited',
            'hero_subtitle' => 'The Premier Social Fellowship & Community Hub in Chatkhil, Noakhali',
            'stats_total_members' => '520+',
            'stats_life_members' => '145+',
            'stats_executive_board' => '25',
            'stats_events_held' => '65+',
            'president_name' => 'Alhaj Md. Faruk Hossain',
            'president_title' => 'President, Chatkhil Elite Club Limited',
            'president_message_short' => 'Welcome to Chatkhil Elite Club Limited. Founded on the ideals of camaraderie, public service, and mutual progress, our club stands as a shining beacon of unity for the accomplished sons and daughters of Chatkhil.',
        ];

        foreach ($settings as $key => $val) {
            Setting::set($key, $val);
        }

        // 4. Core CMS Pages
        Page::create([
            'title' => 'About Chatkhil Elite Club Limited',
            'slug' => 'about-us',
            'subtitle' => 'Fostering brotherhood, community excellence and social welfare since inception.',
            'content' => '<h3>Welcome to Chatkhil Elite Club Limited</h3>
            <p>Chatkhil Elite Club Limited is a premier social and community club representing the professionals, entrepreneurs, cultural patrons, and community leaders of Chatkhil Upazila, Noakhali District, Bangladesh.</p>
            <p>The club was founded to provide a non-political, forward-looking fellowship platform that brings together accomplished individuals dedicated to mutual growth, social enrichment, recreational excellence, and noble humanitarian causes for Chatkhil and its surrounding areas.</p>
            <p>Over the years, the club has distinguished itself through organizing charitable aid, scholarships for underprivileged meritorious students, health camps, relief operations during monsoon floods, grand cultural celebrations, annual sports tournaments, and scholarly discussions.</p>',
            'meta_title' => 'About Chatkhil Elite Club Limited | Noakhali, Bangladesh',
            'meta_description' => 'Learn about the history, purpose, and community leadership of Chatkhil Elite Club Limited, Noakhali, Bangladesh.',
        ]);

        Page::create([
            'title' => 'Mission & Vision',
            'slug' => 'mission-vision',
            'subtitle' => 'Our guiding compass towards sustainable social leadership.',
            'content' => '<h3>Our Vision</h3>
            <p>To be recognized as the most distinguished, ethical, and impactful social club in the greater Noakhali region, inspiring holistic community transformation through enlightened fellowship.</p>
            <h3>Our Mission</h3>
            <ul>
                <li><strong>Fellowship & Solidarity:</strong> To cultivate a vibrant sanctuary where members connect, exchange ideas, and build lifelong bonds of brotherhood.</li>
                <li><strong>Community Empowerment:</strong> To spearhead humanitarian initiatives, disaster relief, education stipends, and medical assistance for the people of Chatkhil.</li>
                <li><strong>Cultural Preservation:</strong> To patronize the rich heritage, arts, literature, and sports of Bangladesh.</li>
                <li><strong>Youth Guidance:</strong> To mentor emerging leaders and entrepreneurs from our locality towards national and global success.</li>
            </ul>',
        ]);

        Page::create([
            'title' => "President's Message",
            'slug' => 'president-message',
            'subtitle' => 'A warm greeting from the Executive Leadership.',
            'content' => '<p><strong>Assalamu Alaikum wa Rahmatullah,</strong></p>
            <p>It is my utmost honor and pleasure to welcome you to the official web portal of <strong>Chatkhil Elite Club Limited</strong>.</p>
            <p>Our beloved Chatkhil has always been blessed with resilient, accomplished, and generous individuals who have left significant marks across business, public administration, medicine, engineering, law, and academia. Chatkhil Elite Club was envisioned as our collective home — where mutual respect and unity translate into meaningful deeds for our motherland.</p>
            <p>As we march forward with our digital platform, we invite all eligible citizens and expatriates from Chatkhil to join our fellowship, actively participate in our events, and contribute toward a prosperous, educated, and progressive community.</p>
            <p>May Almighty Allah bless our collective endeavors.</p>
            <p>Warmest regards,<br>
            <strong>Alhaj Md. Faruk Hossain</strong><br>
            President, Chatkhil Elite Club Limited</p>',
        ]);

        Page::create([
            'title' => 'Club Constitution & By-Laws',
            'slug' => 'constitution',
            'subtitle' => 'Governing rules, code of ethics, and membership regulations.',
            'content' => '<h3>Summary of Club By-Laws</h3>
            <p>Chatkhil Elite Club Limited operates in strict compliance with its constitution, registered under the relevant laws of the People\'s Republic of Bangladesh.</p>
            <h4>Key Clauses</h4>
            <ol>
                <li><strong>Non-Political Identity:</strong> The Club shall remain strictly non-partisan and secular, devoted entirely to social, educational, humanitarian, and cultural welfare.</li>
                <li><strong>Membership Eligibility:</strong> Any citizen of Bangladesh of good moral standing with roots or connection to Chatkhil, possessing respectable professional or civic credentials, may apply.</li>
                <li><strong>Governance:</strong> The executive affairs of the Club shall be administered by a democratically constituted Executive Committee elected or selected every two years by the General Body.</li>
                <li><strong>Code of Conduct:</strong> All members must uphold dignity, mutual brotherhood, and decorum at all club premises, digital portals, and official functions.</li>
            </ol>',
        ]);

        // 5. Members (Approved + Pending)
        $member1 = Member::create([
            'user_id' => $memberUser->id,
            'membership_type_id' => $life->id,
            'member_id' => 'CEC-2026-0001',
            'full_name' => 'Barrister Kamal Hossain Chowdhury',
            'father_name' => 'Late Alhaj Nurul Huda Chowdhury',
            'mother_name' => 'Begum Shamsunnahar',
            'spouse_name' => 'Advocate Nasreen Sultana',
            'date_of_birth' => '1982-05-14',
            'gender' => 'male',
            'blood_group' => 'B+',
            'mobile' => '+8801711223344',
            'emergency_contact' => '+8801819556677',
            'email' => 'member@chatkhil.club',
            'present_address' => 'House 14, Road 7, Sector 3, Uttara, Dhaka',
            'permanent_address' => 'Chowdhury Bari, Village: Khilpara, Upazila: Chatkhil, Noakhali',
            'district' => 'Noakhali',
            'upazila' => 'Chatkhil',
            'profession' => 'Advocate & Legal Consultant',
            'organization' => 'Supreme Court of Bangladesh',
            'designation' => 'Senior Partner',
            'proposed_by_name' => 'Alhaj Md. Faruk Hossain',
            'proposed_by_member_id' => 'CEC-2026-0000',
            'status' => 'approved',
            'approved_by' => $superAdmin->id,
            'approved_at' => now(),
            'is_public_directory' => true,
            'show_phone_public' => true,
            'show_email_public' => true,
        ]);

        $member2 = Member::create([
            'membership_type_id' => $general->id,
            'member_id' => 'CEC-2026-0002',
            'full_name' => 'Engr. M. A. Karim',
            'father_name' => 'Late Abdul Jabbar',
            'mother_name' => 'Ayesha Khatun',
            'date_of_birth' => '1978-11-20',
            'gender' => 'male',
            'blood_group' => 'A+',
            'mobile' => '+8801819123456',
            'email' => 'karim.engr@gmail.com',
            'present_address' => 'Chatkhil Sadar, Noakhali',
            'permanent_address' => 'Panchgaon, Chatkhil, Noakhali',
            'district' => 'Noakhali',
            'upazila' => 'Chatkhil',
            'profession' => 'Civil Engineer & Contractor',
            'organization' => 'Karim Builders & Associates',
            'designation' => 'Managing Director',
            'status' => 'approved',
            'approved_by' => $superAdmin->id,
            'approved_at' => now(),
            'is_public_directory' => true,
            'show_phone_public' => false,
            'show_email_public' => false,
        ]);

        $member3 = Member::create([
            'membership_type_id' => $life->id,
            'member_id' => 'CEC-2026-0003',
            'full_name' => 'Dr. Shamsul Alam MBBS, FCPS',
            'father_name' => 'Prof. Mokhlesur Rahman',
            'mother_name' => 'Fatema Begum',
            'date_of_birth' => '1975-03-10',
            'gender' => 'male',
            'blood_group' => 'O+',
            'mobile' => '+8801912987654',
            'email' => 'dr.shamsul@hospital.bd',
            'present_address' => 'Dhanmondi, Dhaka',
            'permanent_address' => 'Bhatra, Chatkhil, Noakhali',
            'district' => 'Noakhali',
            'upazila' => 'Chatkhil',
            'profession' => 'Physician & Specialist',
            'organization' => 'Dhaka Medical College & Hospital',
            'designation' => 'Associate Professor',
            'status' => 'approved',
            'approved_by' => $superAdmin->id,
            'approved_at' => now(),
            'is_public_directory' => true,
            'show_phone_public' => false,
            'show_email_public' => false,
        ]);

        $member4 = Member::create([
            'membership_type_id' => $executive->id,
            'member_id' => 'CEC-2026-0004',
            'full_name' => 'Advocate Golam Mostafa',
            'father_name' => 'Late Jalal Ahmed',
            'date_of_birth' => '1980-08-25',
            'gender' => 'male',
            'blood_group' => 'AB+',
            'mobile' => '+8801715887766',
            'email' => 'adv.mostafa@gmail.com',
            'present_address' => 'Maijdee Court, Noakhali',
            'permanent_address' => 'Badalkot, Chatkhil, Noakhali',
            'district' => 'Noakhali',
            'upazila' => 'Chatkhil',
            'profession' => 'Lawyer',
            'organization' => 'District Bar Association, Noakhali',
            'designation' => 'Advocate',
            'status' => 'approved',
            'approved_by' => $superAdmin->id,
            'approved_at' => now(),
            'is_public_directory' => true,
            'show_phone_public' => false,
            'show_email_public' => false,
        ]);

        // Pending Applicants
        Member::create([
            'membership_type_id' => $general->id,
            'full_name' => 'Zakir Hossain Bhuiyan',
            'father_name' => 'Alhaj Delwar Hossain',
            'mother_name' => 'Rokeya Begum',
            'date_of_birth' => '1988-09-12',
            'gender' => 'male',
            'blood_group' => 'B+',
            'mobile' => '+8801823456789',
            'email' => 'zakir.bhuiyan@exportbd.com',
            'present_address' => 'Gulshan-1, Dhaka',
            'permanent_address' => 'Shahapur, Chatkhil, Noakhali',
            'district' => 'Noakhali',
            'upazila' => 'Chatkhil',
            'profession' => 'Businessman / Exporter',
            'organization' => 'Bhuiyan Trade International',
            'designation' => 'Proprietor',
            'proposed_by_name' => 'Engr. M. A. Karim',
            'proposed_by_member_id' => 'CEC-2026-0002',
            'status' => 'pending',
            'is_public_directory' => true,
        ]);

        Member::create([
            'membership_type_id' => $associate->id,
            'full_name' => 'Tanjina Sultana Rimi',
            'father_name' => 'M. A. Matin',
            'mother_name' => 'Salma Matin',
            'date_of_birth' => '1995-12-05',
            'gender' => 'female',
            'blood_group' => 'O+',
            'mobile' => '+8801678112233',
            'email' => 'rimi.sultana@edu.bd',
            'present_address' => 'Chatkhil Bazar, Noakhali',
            'permanent_address' => 'Chatkhil Municipality, Noakhali',
            'district' => 'Noakhali',
            'upazila' => 'Chatkhil',
            'profession' => 'Lecturer',
            'organization' => 'Chatkhil Government College',
            'designation' => 'Lecturer in Economics',
            'proposed_by_name' => 'Dr. Shamsul Alam',
            'proposed_by_member_id' => 'CEC-2026-0003',
            'status' => 'pending',
            'is_public_directory' => true,
        ]);

        // Payment record for member1
        MembershipPayment::create([
            'member_id' => $member1->id,
            'amount' => 100000.00,
            'purpose' => 'admission_fee',
            'payment_method' => 'bank_transfer',
            'transaction_id' => 'IBBL-TXN-20260215-9921',
            'payment_date' => '2026-02-15',
            'status' => 'verified',
            'verified_by' => $superAdmin->id,
            'admin_notes' => 'Verified with Islami Bank Chatkhil Branch receipt.',
        ]);

        // 6. Committees
        $currentCommittee = Committee::create([
            'name' => 'Executive Committee 2026–2028',
            'term_start_year' => 2026,
            'term_end_year' => 2028,
            'is_current' => true,
            'status' => 'active',
        ]);

        $formerCommittee = Committee::create([
            'name' => 'Executive Committee 2024–2026',
            'term_start_year' => 2024,
            'term_end_year' => 2026,
            'is_current' => false,
            'status' => 'archived',
        ]);

        // Committee Members for Current Term
        $committeeData = [
            ['name' => 'Alhaj Md. Faruk Hossain', 'designation' => 'President', 'order' => 1, 'phone' => '+8801819200000', 'bio' => 'Eminent industrialist and philanthropist from Chatkhil.'],
            ['name' => 'Engr. M. A. Karim', 'designation' => 'Senior Vice President', 'order' => 2, 'phone' => '+8801819123456', 'bio' => 'Senior engineer and entrepreneur with 25+ years experience.'],
            ['name' => 'Dr. Shamsul Alam', 'designation' => 'Vice President', 'order' => 3, 'phone' => '+8801912987654', 'bio' => 'Distinguished medical specialist and social worker.'],
            ['name' => 'Advocate Golam Mostafa', 'designation' => 'General Secretary', 'order' => 4, 'phone' => '+8801715887766', 'bio' => 'Prominent legal practitioner dedicated to community justice.'],
            ['name' => 'Kazi Saifuddin', 'designation' => 'Joint Secretary', 'order' => 5, 'phone' => '+8801712000000', 'bio' => 'Civic organizer and cultural enthusiast.'],
            ['name' => 'Md. Nurul Islam', 'designation' => 'Treasurer', 'order' => 6, 'phone' => '+8801817000000', 'bio' => 'Senior banker and financial administrator.'],
            ['name' => 'Tariqul Islam', 'designation' => 'Organizing Secretary', 'order' => 7, 'phone' => '+8801818000000', 'bio' => 'Youth leader and sports coordinator.'],
            ['name' => 'Sabrina Akhter', 'designation' => 'Cultural Secretary', 'order' => 8, 'phone' => '+8801713000000', 'bio' => 'Promoter of regional heritage and arts.'],
            ['name' => 'Asif Mahmud', 'designation' => 'Sports Secretary', 'order' => 9, 'phone' => '+8801714000000', 'bio' => 'Former university athlete and club sports director.'],
            ['name' => 'Barrister Kamal Hossain Chowdhury', 'designation' => 'Executive Member', 'order' => 10, 'phone' => '+8801711223344', 'bio' => 'Supreme Court advocate and club life member.'],
        ];

        foreach ($committeeData as $item) {
            CommitteeMember::create([
                'committee_id' => $currentCommittee->id,
                'name' => $item['name'],
                'designation' => $item['designation'],
                'phone' => $item['phone'],
                'bio' => $item['bio'],
                'display_order' => $item['order'],
            ]);
        }

        // Former committee members
        CommitteeMember::create([
            'committee_id' => $formerCommittee->id,
            'name' => 'Alhaj Sirajul Islam',
            'designation' => 'Immediate Past President (2024–2026)',
            'display_order' => 1,
            'bio' => 'Founding leader of Chatkhil Elite Club.',
        ]);
        CommitteeMember::create([
            'committee_id' => $formerCommittee->id,
            'name' => 'Md. Harun-ur-Rashid',
            'designation' => 'Former General Secretary (2024–2026)',
            'display_order' => 2,
            'bio' => 'Instrumental in establishing the club constitution.',
        ]);

        // 7. Events
        $event1 = Event::create([
            'title' => 'Grand Annual Reunion & Gala Dinner 2026',
            'slug' => 'grand-annual-reunion-gala-dinner-2026',
            'event_date' => '2026-11-20',
            'event_time' => '05:00 PM – 10:00 PM',
            'venue' => 'Elite Club Banquet Hall, Chatkhil, Noakhali',
            'short_description' => 'The flagship annual gathering of all Chatkhil Elite Club members, their families, and esteemed guests.',
            'full_description' => '<p>Chatkhil Elite Club Limited cordially invites all respected members and their families to our <strong>Grand Annual Reunion & Gala Dinner 2026</strong>.</p>
            <p>Highlights of the evening include:</p>
            <ul>
                <li>Presidential address & Annual Report presentation</li>
                <li>Felicitation of distinguished life members and scholars</li>
                <li>Exclusive cultural musical performance featuring renowned national artists</li>
                <li>Sumptuous traditional Mezban & Gala Dinner</li>
            </ul>
            <p>Kindly register in advance to confirm your family seats.</p>',
            'is_registration_required' => true,
            'registration_fee' => 1500.00,
            'registration_deadline' => '2026-11-15 23:59:59',
            'max_participants' => 300,
            'status' => 'published',
            'is_featured' => true,
        ]);

        $event2 = Event::create([
            'title' => 'Chatkhil Elite Club Annual Badminton & Table Tennis Tournament',
            'slug' => 'annual-sports-tournament-2026',
            'event_date' => '2026-12-10',
            'event_time' => '03:00 PM – 09:00 PM',
            'venue' => 'Chatkhil Club Sports Arena, Chatkhil',
            'short_description' => 'A lively sporting festival for club members and youth to celebrate fitness and healthy competition.',
            'full_description' => '<p>Get ready for our annual sports championship! Multiple categories in Singles & Doubles Badminton and Table Tennis.</p>',
            'is_registration_required' => true,
            'registration_fee' => 500.00,
            'status' => 'published',
            'is_featured' => false,
        ]);

        $event3 = Event::create([
            'title' => 'Grand Iftar, Doa Mahfil & Charity Distribution',
            'slug' => 'grand-iftar-doa-mahfil-2026',
            'event_date' => '2026-03-28',
            'event_time' => '04:30 PM',
            'venue' => 'Chatkhil Central Auditorium, Noakhali',
            'short_description' => 'A sacred evening of spiritual bonding, prayer for our community, and Ramadan relief package distribution.',
            'full_description' => '<p>Special prayer for world peace and prosperity of Chatkhil followed by community Iftar and distribution of food hampers to 500 needy families.</p>',
            'is_registration_required' => false,
            'registration_fee' => 0.00,
            'status' => 'published',
            'is_featured' => true,
        ]);

        // Demo Event Registration
        EventRegistration::create([
            'event_id' => $event1->id,
            'member_id' => $member1->id,
            'guest_name' => 'Barrister Kamal Hossain Chowdhury',
            'guest_phone' => '+8801711223344',
            'guest_email' => 'member@chatkhil.club',
            'guest_count' => 2,
            'total_amount' => 3000.00,
            'payment_status' => 'paid',
            'transaction_id' => 'BKASH-REU-00918',
            'notes' => 'Attending with spouse.',
        ]);

        // 8. Notices
        Notice::create([
            'title' => 'Important Circular: Membership Renewal & Digital ID Collection for 2026',
            'slug' => 'membership-renewal-digital-id-collection-2026',
            'notice_number' => 'CEC/NOT/2026/01',
            'description' => 'All General and Associate members of Chatkhil Elite Club Limited are requested to complete their annual subscription for the fiscal year 2026 by October 31, 2026. Approved members can now view and download their verified Digital Membership Cards from the Member Portal.',
            'publish_date' => '2026-09-15',
            'is_pinned' => true,
            'status' => 'published',
        ]);

        Notice::create([
            'title' => 'Notice regarding 7th Annual General Meeting (AGM) 2026',
            'slug' => 'notice-7th-annual-general-meeting-agm-2026',
            'notice_number' => 'CEC/NOT/2026/02',
            'description' => 'The 7th Annual General Meeting of Chatkhil Elite Club Limited will be held on Friday, November 27, 2026, at 10:00 AM at the Club Auditorium. The agenda includes confirmation of minutes, audited financial report, and development roadmap.',
            'publish_date' => '2026-09-20',
            'is_pinned' => true,
            'status' => 'published',
        ]);

        Notice::create([
            'title' => 'Flood Relief and Winter Blanket Distribution Committee Formation',
            'slug' => 'relief-committee-formation-2026',
            'notice_number' => 'CEC/NOT/2026/03',
            'description' => 'An emergency humanitarian relief wing has been constituted under the chairmanship of Vice President Dr. Shamsul Alam. Contributions are welcome through club official accounts.',
            'publish_date' => '2026-08-28',
            'is_pinned' => false,
            'status' => 'published',
        ]);

        // 9. News Categories & Posts
        $catSocial = NewsCategory::create(['name' => 'Club Activities', 'slug' => 'club-activities']);
        $catCharity = NewsCategory::create(['name' => 'Community & Charity', 'slug' => 'community-charity']);
        $catSports = NewsCategory::create(['name' => 'Sports & Culture', 'slug' => 'sports-culture']);

        News::create([
            'news_category_id' => $catCharity->id,
            'title' => 'Chatkhil Elite Club Distributes Educational Stipends to 50 Meritorious Students',
            'slug' => 'elite-club-distributes-educational-stipends-50-students',
            'summary' => 'In a solemn ceremony held at the club auditorium, scholarships and educational supplies were handed over to deserving high school and college students of Chatkhil.',
            'content' => '<p>Under its flagship "Alor Dishari" community education program, Chatkhil Elite Club Limited awarded annual educational stipends to 50 brilliant yet financially disadvantaged students from 15 academic institutions across Chatkhil Upazila.</p>
            <p>Speaking on the occasion, Club President Alhaj Md. Faruk Hossain reiterated the club\'s unwavering commitment to cultivating talent and ensuring that no gifted child in Chatkhil drops out due to economic hardship.</p>',
            'author_name' => 'CEC Media Wing',
            'is_featured' => true,
            'published_at' => '2026-09-10 10:00:00',
            'status' => 'published',
        ]);

        News::create([
            'news_category_id' => $catSocial->id,
            'title' => 'Executive Committee Inspects Construction Progress of New Club Gymnasium',
            'slug' => 'executive-committee-inspects-new-gymnasium',
            'summary' => 'The modern wellness and indoor fitness center at the club premises is on track for a grand inauguration this winter.',
            'content' => '<p>Members of the Executive Board visited the ongoing renovation site of the upcoming state-of-the-art gymnasium and wellness wing located on the 3rd floor of the club complex.</p>',
            'author_name' => 'CEC Media Wing',
            'is_featured' => false,
            'published_at' => '2026-09-02 14:30:00',
            'status' => 'published',
        ]);

        News::create([
            'news_category_id' => $catSports->id,
            'title' => 'Friendly Cricket Match: Elite Club XI Clinches Victory in Thrilling Contest',
            'slug' => 'friendly-cricket-match-victory-2026',
            'summary' => 'A spirited weekend match at Chatkhil Government High School grounds brought together club members and local sports enthusiasts.',
            'content' => '<p>Chatkhil Elite Club XI secured a 4-wicket triumph in a friendly 20-over clash. Sports Secretary Asif Mahmud praised the sportsmanship and fellowship displayed by all participants.</p>',
            'author_name' => 'CEC Sports Wing',
            'is_featured' => false,
            'published_at' => '2026-08-18 18:00:00',
            'status' => 'published',
        ]);

        // 10. Photo Galleries
        $gal1 = Gallery::create([
            'title' => 'Annual Gala Night & Member Felicitation',
            'slug' => 'annual-gala-night-member-felicitation',
            'event_date' => '2026-02-21',
            'description' => 'Memorable highlights from our gala night celebrating community leaders and club achievements.',
            'status' => 'published',
        ]);

        $gal2 = Gallery::create([
            'title' => 'Chatkhil Community Free Medical Camp & Relief',
            'slug' => 'chatkhil-free-medical-camp',
            'event_date' => '2026-04-14',
            'description' => 'Free medical consultation, diagnostic tests, and essential medicines distributed to over 800 patients.',
            'status' => 'published',
        ]);

        // 11. Documents
        Document::create([
            'title' => 'Chatkhil Elite Club Limited Constitution & Rules (English & Bangla)',
            'category' => 'constitution',
            'file_path' => 'CEC_Constitution_Rules_2026.pdf',
            'file_size' => '2.4 MB',
            'description' => 'Official ratified constitution, by-laws, code of ethics, and governance guidelines of the club.',
            'is_public' => true,
        ]);

        Document::create([
            'title' => 'Official Membership Application & Referral Form (Printable Version)',
            'category' => 'form',
            'file_path' => 'CEC_Membership_Application_Form.pdf',
            'file_size' => '650 KB',
            'description' => 'Offline printable membership application form for applicants preferring manual submission at the club secretariat.',
            'is_public' => true,
        ]);

        Document::create([
            'title' => 'Annual Activity & Audit Report (Fiscal Year 2025–2026)',
            'category' => 'report',
            'file_path' => 'CEC_Annual_Audit_Report_2025_2026.pdf',
            'file_size' => '3.8 MB',
            'description' => 'Comprehensive transparency report, financial statements, and welfare spending overview presented to the General Body.',
            'is_public' => true,
        ]);
    }
}
