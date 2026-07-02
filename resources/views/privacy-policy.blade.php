<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Privacy Policy | MyTalentIndia</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">

    <!--===================
            NAVBAR
    ==================== -->
    @include('Components.navbar')

    <!-- PAGE -->
    <section class="py-16 flex-1">
        <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-6 sm:p-10 space-y-8">

            <div>
                <h2 class="text-xl font-black text-blue-950 mb-3">
                    1. Information We Collect
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    MyTalentIndia may collect personal information such as your name,
                    email address, phone number, age, city, school/organization details,
                    and other information provided during registration or participation
                    in contests and events.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-black text-blue-950 mb-3">
                    2. How We Use Your Information
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    The information collected is used to process registrations, manage
                    contest participation, communicate important updates, verify entries,
                    issue certificates, announce results, and improve our services.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-black text-blue-950 mb-3">
                    3. Payment Information
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    Payments are processed through secure third-party payment gateways.
                    MyTalentIndia does not store your complete debit card, credit card,
                    banking, or payment credentials on its servers.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-black text-blue-950 mb-3">
                    4. Artwork & Submission Data
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    Artwork, images, documents, and other materials submitted by
                    participants may be stored and used for contest evaluation,
                    certificate generation, promotional activities, and educational
                    purposes as permitted by our Terms & Conditions.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-black text-blue-950 mb-3">
                    5. Sharing of Information
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    We do not sell, rent, or trade personal information to third parties.
                    Information may only be shared with trusted service providers,
                    payment partners, legal authorities, or when required by applicable law.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-black text-blue-950 mb-3">
                    6. Data Security
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    MyTalentIndia implements reasonable security measures to protect
                    user information from unauthorized access, disclosure, alteration,
                    or misuse. However, no online system can guarantee absolute security.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-black text-blue-950 mb-3">
                    7. Cookies & Analytics
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    Our platform may use cookies and analytics tools to enhance user
                    experience, understand website traffic, remember preferences,
                    and improve overall platform performance.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-black text-blue-950 mb-3">
                    8. Certificate & Result Publication
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    Participant names, rankings, achievements, certificates, and
                    submitted works may be displayed on the MyTalentIndia website,
                    social media platforms, promotional materials, or event reports.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-black text-blue-950 mb-3">
                    9. User Rights
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    Users may request correction of inaccurate information or contact
                    us regarding concerns about personal data stored on the platform,
                    subject to applicable legal and operational requirements.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-black text-blue-950 mb-3">
                    10. Changes to This Privacy Policy
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    MyTalentIndia reserves the right to modify this Privacy Policy at
                    any time. Updated versions will be published on this page, and
                    continued use of the platform indicates acceptance of the revised policy.
                </p>
            </div>

        </div>
    </section>

    <!-- FOOTER -->
    @include('Components.footer')

    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>