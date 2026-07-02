<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Terms & Condition Policy | MyTalentIndia</title>

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
                    1. Acceptance of Terms
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    By registering for and participating in any contest, competition, event,
                    or activity hosted by MyTalentIndia, you agree to comply with these
                    Terms & Conditions and all applicable rules and guidelines.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-black text-blue-950 mb-3">
                    2. Participant Eligibility
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    Participants must provide accurate and complete information during
                    registration. MyTalentIndia reserves the right to reject or cancel
                    registrations containing false, misleading, or incomplete details.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-black text-blue-950 mb-3">
                    3. Originality of Submissions
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    All submitted artwork, projects, or entries must be the participant's
                    original work. Plagiarized, copied, traced, or unauthorized content
                    may result in immediate disqualification without notice.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-black text-blue-950 mb-3">
                    4. Submission Policy
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    Participants are responsible for submitting their entries before the
                    specified deadline. Once an entry has been successfully submitted,
                    modifications, replacements, or withdrawals may not be permitted.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-black text-blue-950 mb-3">
                    5. Judging & Results
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    All entries will be evaluated according to the contest criteria.
                    Decisions made by the judging panel or organizing committee are final,
                    binding, and not subject to dispute or appeal.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-black text-blue-950 mb-3">
                    6. Intellectual Property Rights
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    Participants retain ownership of their original work. However, by
                    submitting an entry, participants grant MyTalentIndia a non-exclusive,
                    royalty-free right to display, publish, promote, and use the submitted
                    content for marketing, educational, and promotional purposes.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-black text-blue-950 mb-3">
                    7. Registration Fees
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    Any registration fee paid for participation is subject to the Refund &
                    Cancellation Policy available on the platform. Submission of payment
                    indicates acceptance of the applicable refund terms.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-black text-blue-950 mb-3">
                    8. Prohibited Activities
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    Participants shall not engage in fraudulent activities, impersonation,
                    submission of offensive content, unauthorized use of another person's
                    work, or any activity that may harm the integrity of the platform.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-black text-blue-950 mb-3">
                    9. Account Suspension & Disqualification
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    MyTalentIndia reserves the right to suspend accounts, reject entries,
                    cancel registrations, or disqualify participants found violating these
                    terms, contest rules, or applicable laws.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-black text-blue-950 mb-3">
                    10. Limitation of Liability
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    MyTalentIndia shall not be responsible for technical failures,
                    internet disruptions, delayed submissions, data loss, or any indirect
                    damages arising from participation in contests or use of the platform.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-black text-blue-950 mb-3">
                    11. Changes to Terms
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    MyTalentIndia may update or modify these Terms & Conditions at any time.
                    Continued use of the platform after such changes constitutes acceptance
                    of the revised terms.
                </p>
            </div>

        </div>
    </section>

    <!-- FOOTER -->
    @include('Components.footer')

    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>