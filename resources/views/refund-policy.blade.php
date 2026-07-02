<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Refund & Cancellation policy | MyTalentIndia</title>

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
                    Registration Fees
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    All registration fees paid for participation in contests, competitions,
                    workshops, or events organized through MyTalentIndia are generally
                    non-refundable once the registration process has been completed successfully.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-black text-blue-950 mb-3">
                    Cancellation by Participant
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    Participants may request cancellation before submitting their final artwork
                    or entry. However, approval of cancellation requests is solely at the
                    discretion of MyTalentIndia and does not guarantee a refund.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-black text-blue-950 mb-3">
                    Eligible Refund Cases
                </h2>

                <ul class="space-y-3 text-gray-600">

                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-circle-check text-green-500 mt-1"></i>
                        Duplicate payment made for the same registration.
                    </li>

                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-circle-check text-green-500 mt-1"></i>
                        Payment deducted successfully but registration was not completed due to a system error.
                    </li>

                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-circle-check text-green-500 mt-1"></i>
                        Technical payment failures verified by our team and payment gateway records.
                    </li>

                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-circle-check text-green-500 mt-1"></i>
                        Any other exceptional circumstances approved by MyTalentIndia management.
                    </li>

                </ul>
            </div>

            <div>
                <h2 class="text-xl font-black text-blue-950 mb-3">
                    Non-Refundable Situations
                </h2>

                <ul class="space-y-3 text-gray-600">

                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-circle-xmark text-red-500 mt-1"></i>
                        Change of mind after successful registration.
                    </li>

                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-circle-xmark text-red-500 mt-1"></i>
                        Failure to participate in the contest or event.
                    </li>

                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-circle-xmark text-red-500 mt-1"></i>
                        Disqualification due to violation of contest rules or guidelines.
                    </li>

                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-circle-xmark text-red-500 mt-1"></i>
                        Incorrect information provided during registration.
                    </li>

                </ul>
            </div>

            <div>
                <h2 class="text-xl font-black text-blue-950 mb-3">
                    Refund Processing Timeline
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    Once approved, refunds will be processed through the original payment
                    method. The amount may take approximately 5–10 business days to reflect
                    in the participant's account, depending on the bank or payment provider.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-black text-blue-950 mb-3">
                    Contact for Refund Requests
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    For refund-related queries, participants may contact MyTalentIndia
                    support with their registration ID, payment details, and a description
                    of the issue. All requests will be reviewed on a case-by-case basis.
                </p>
            </div>

        </div>

    </section>

    <!-- FOOTER -->
    @include('Components.footer')

    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>