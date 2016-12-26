<?php

use Illuminate\Database\Seeder;

class HelpTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('help')->delete();

        DB::table('help')->insert([
            ['id'             => '1',
             'category_id'    => '1',
             'subcategory_id' => '1',
             'question'       => 'A Community Built on Sharing',
             'answer'         => '<div>SITE_NAME began in 2016 when two designers who had space to share hosted three travelers looking for a place to stay. Now, millions of hosts and travelers choose to create a free SITE_NAME account so they can list their space and book unique accommodations anywhere in the world</div><div><br></div><div>Profiles</div><div><br></div><div>No two hosts or travelers are the same, so personal SITE_NAME profiles help hosts and guests learn more about each other before sharing a space. SITE_NAME doesn\'t display full names or contact information on public profiles, so the community can feel confident that their information is safe.</div><div><br></div><div>Listings</div><div><br></div><div>From futons on the floor to castles on the hilltop, each SITE_NAME listings is unique. Search results feature entire homes, private rooms, and shared rooms at every price point. Hosts describe their space in detail, including available amenities and arrival and departure times, and guests leave reviews about their experience.</div>',
             'suggested'      => 'no',
             'status'         => 'Active',
             'created_at'     => '2016-05-10 07:06:52',
             'updated_at'     => '2016-05-10 07:49:45'
            ],
            ['id'             => '2',
             'category_id'    => '1',
             'subcategory_id' => '1',
             'question'       => 'Trusted Services',
             'answer'         => '<div>SITE_NAME helps make sharing easy, enjoyable, and safe. We verify personal profiles and listings, maintain a smart messaging system so hosts and guests can communicate with certainty, and manage a trusted platform to collect and transfer payments.</div><div>Verifications</div><div><br></div><div>SITE_NAME puts hosts and travelers at ease with features like Verified ID and public reviews. Having a Verified ID indicates that you\'ve completed a specific set of verifications—offline ID, online ID, profile photo, email address, and phone number. Hosts and guests also build trust and cultivate their reputations by writing reviews about their experiences after each trip.</div><div><br></div><div>Messaging</div><div><br></div><div>Our messaging system ensures that communication between hosts and guests stays on SITE_NAME so your contact information remains private until you have a confirmed reservation. For your peace of mind, we\'ve added reporting features so you can easily notify us if you ever feel uncomfortable.</div><div><br></div><div>Payment System</div><div><br></div><div>Our convenient payment system supports many currencies and several types of payment and payout methods. SITE_NAME collects guest payments from the moment they make a reservation and waits until 24 hours after arrival before releasing funds to the host. This way, guests and hosts can feel confident knowing that SITE_NAME will process and deliver payments when a reservation is honored.</div>',
             'suggested'      => 'no',
             'status'         => 'Active',
             'created_at'     => '2016-05-10 07:19:17',
             'updated_at'     => '2016-05-10 07:49:31'
            ],
            ['id'             => '3',
             'category_id'    => '1',
             'subcategory_id' => '2',
             'question'       => 'Search',
             'answer'         => '<div>SITE_NAME hosts share their spaces in 190 countries and more than 34,000 cities. All you have to do is enter your destination and travel dates into the search bar to discover distinctive places to stay, anywhere in the world.</div><div>Tools that help you search</div><div><br></div><div>We display photos of listings, host profiles, and reviews to help you make informed decisions when considering a host\'s space. We\'ve also created search filters so you can narrow your results by type of accommodation, price, and location. For example, if you’re looking to make friends and stay with a host, select Private Room or Shared Room. Or if you’re looking for an entire space to call your own, go ahead and select the Entire Place filter.</div><div><br></div><div>Contacting hosts to book a stay</div><div><br></div><div>Once you complete your profile to give hosts a good idea of the kind of guest you are, you can request to book a host\'s space by clicking the Contact Host or Request to Book buttons, or you can use Instant Book to confirm your stay without having to wait for a host\'s approval.</div>',
             'suggested'      => 'no',
             'status'         => 'Active',
             'created_at'     => '2016-05-10 07:20:51',
             'updated_at'     => '2016-05-10 07:49:14'
            ],
            ['id'             => '4',
             'category_id'    => '1',
             'subcategory_id' => '2',
             'question'       => 'Book',
             'answer'         => '<div>There are a few ways to book spaces on SITE_NAME. Some hosts want to get to know a guest before they confirm a reservation while others prefer to reduce the time it takes to manage requests by using SITE_NAME\'s Instant Book feature.</div><div>Buttons to book a stay on SITE_NAME</div><div><br></div><div>The Request to Book button sends a reservation request to a host for the specific trip dates you select. The host has the option to either accept or decline the request, or ask you questions about your trip. When a host responds to your request, we send you an email to let you know. If they don\'t respond within 24 hours, your request simply expires.</div><div><br></div><div>The Instant Book button immediately confirms your reservation and closes the host\'s calendar to other incoming requests. We send you a receipt by email with your trip\'s details, and your host may follow up with you, too.</div><div><br></div><div>The Contact Host button lets you start a conversation about their space and hosting style through our secure messaging system. You can use our messaging system to discuss trip details, request special prices, or ask about specific amenities.</div><div><br></div><div>Payment and confirmation</div><div><br></div><div>Whether you use the Request to Book button or the Instant Book button, we\'ll ask for your payment details so we can hold your reservation.</div><div><br></div><div>If you use the Request to Book button to send a request, the host has 24 hours to respond. We won\'t charge your payment method until the host accepts your reservation. Once the host accepts, we process your payment and send you a congratulatory email that includes your receipt, trip details, and best wishes for a great trip. If you don\'t hear back within 24 hours, your request automatically expires.</div><div><br></div><div>If you use the Instant Book button, your reservation will be immediately confirmed and we\'ll process your payment right away.</div>',
             'suggested'      => 'no',
             'status'         => 'Active',
             'created_at'     => '2016-05-10 07:21:40',
             'updated_at'     => '2016-05-10 07:48:58'
            ],
            ['id'             => '5',
             'category_id'    => '1',
             'subcategory_id' => '2',
             'question'       => 'Travel',
             'answer'         => '<div>Once you know where you’re traveling and whose space you\'ll be staying in, all you have to do is get going!</div><div>Before you get there</div><div><br></div><div>Send a message to your host to arrange a check-in time and arrival details like picking up the key.</div><div><br></div><div>We\'ll send you an email that includes your trip itinerary, receipt, and host contact information. You can also view your reservation details, alter your plans, or cancel your reservation from the My Trips section on your personal account page.</div><div><br></div><div>During your trip</div><div><br></div><div>We encourage you to have the time of your life! Enjoy your host\'s home and city as if it were a friend\'s, and remember to be considerate of your neighbors. If any issues arise during your trip, be sure to get in touch with your host. In most cases, they\'ll be the person best equipped to help you. If your host can\'t solve the problem, please contact us.</div><div><br></div><div>After you travel</div><div><br></div><div>Write a review about your host and their space so other travelers can learn through your experience. Your host will also have a chance to write a review for you, too. Then, pick the next place you\'d love to go and find a space on SITE_NAME!</div>',
             'suggested'      => 'no',
             'status'         => 'Active',
             'created_at'     => '2016-05-10 07:22:47',
             'updated_at'     => '2016-05-10 07:48:16'
            ],
            ['id'             => '6',
             'category_id'    => '1',
             'subcategory_id' => '3',
             'question'       => 'List Your Space',
             'answer'         => '<div>We encourage you to share all kinds of spaces on SITE_NAME! Whether you’re offering a seaside villa or an air mattress in the corner of your living room, it’s free to list your space. When you’re ready to start welcoming guests, you can publish your listing for the world to see.</div><div>Description and amenities</div><div><br></div><div>Guests often search for spaces that meet specific needs, so accurately describing your listing and the amenities you offer will help attract the kinds of guests that are best for you. When telling the story of your space, answer important questions like whether or not you have Wifi, and include helpful details about the character, activities, and transportation options in the surrounding area.</div><div><br></div><div>Photos</div><div><br></div><div>Photographs help guests picture themselves in your space. Go ahead and upload up to 24 images, and make sure your photos are well lit, in focus, and representative of the actual space your guests have access to.</div><div><br></div><div>Pricing and availability</div><div><br></div><div>You know your space and your schedule best, so we let you decide the price and we ask you to update your calendar to reflect when it’s available to rent. We also allow you to set custom prices for individual nights and weekends, special events, and monthly stays. We display your listing at the price you set and when you indicate that your space is unavailable, we make sure not to show it in search results.</div>',
             'suggested'      => 'no',
             'status'         => 'Active',
             'created_at'     => '2016-05-10 07:24:33',
             'updated_at'     => '2016-05-10 07:47:37'
            ],
            ['id'             => '7',
             'category_id'    => '1',
             'subcategory_id' => '3',
             'question'       => 'Respond to Requests',
             'answer'         => '<div>Guests who love your space will want to book it! On SITE_NAME, you have the option to require guests to send a reservation request or allow certain guests to book your space instantly through Instant Book.</div><div>Manage your calendar</div><div><br></div><div>Edit your calendar settings to control when and for how long guests can book your space.</div><div><br></div><div>Simplify with Instant Book</div><div><br></div><div>If you prefer to set criteria to allow certain guests to book your space without having to wait for your approval, you can choose to use our Instant Book feature.</div>',
             'suggested'      => 'no',
             'status'         => 'Active',
             'created_at'     => '2016-05-10 07:25:03',
             'updated_at'     => '2016-05-10 07:46:46'
            ],
            ['id'             => '8',
             'category_id'    => '1',
             'subcategory_id' => '3',
             'question'       => 'Welcome Your Guests',
             'answer'         => '<div>Once you have a confirmed reservation, it’s time to prepare for your guests! From tidying your space and coordinating key exchange to greeting your guests and giving them neighborhood tips, hosting on SITE_NAME is an artform.</div><div><br></div><div>Preparing your space</div><div><br></div><div>Give your guests a clean space to come home to and make sure they have everything they\'ll need for a comfortable stay, whether it’s an extra set of towels, cream and sugar for coffee, maps to find their way, or instructions for how to access the internet. If you like, you can make their stay extra special by surprising them with a bottle of wine or hand-written welcome note.</div><div><br></div><div>Coordinating arrival and departure</div><div><br></div><div>Use our messaging system to arrange the details of your guest’s arrival and departure. Let your guest know if you’ll greet them in person or tell them where they can find your key.</div><div><br></div><div>Being available during your guest’s stay</div><div><br></div><div>During reservations, be available to help remedy any issues that may arise. If you\'ll be out of the area, provide your guests with a designated and reliable point of contact.</div><div><br></div><div>Writing reviews</div><div><br></div><div>Genuine reviews are the cornerstone of SITE_NAME\'s trusted community. You have 14 days to write a review and share comments about your experience with your guest. Your guest also has the opportunity to review you and your space, too!</div>',
             'suggested'      => 'no',
             'status'         => 'Active',
             'created_at'     => '2016-05-10 07:25:56',
             'updated_at'     => '2016-05-10 07:46:19'
            ],
            ['id'             => '9',
             'category_id'    => '2',
             'subcategory_id' => '13',
             'question'       => 'How do I create an account?',
             'answer'         => '<div>If you don\'t have an SITE_NAME account yet, go to SITE_NAME.com and click Sign Up.</div><div><br></div><div>You can sign up using your email address, Facebook account, Google account. Signing up and creating an SITE_NAME account is free.</div><div><br></div><div>After you sign up, be sure to complete your account before booking a reservation.</div>',
             'suggested'      => 'yes',
             'status'         => 'Active',
             'created_at'     => '2016-05-10 07:27:59',
             'updated_at'     => '2016-05-10 07:27:59'
            ],
            ['id'             => '10',
             'category_id'    => '2',
             'subcategory_id' => '13',
             'question'       => 'What are the requirements to book on SITE_NAME?',
             'answer'         => '<div>We ask everyone who uses SITE_NAME for a few pieces of information before they travel on SITE_NAME. Guests need to have this info completely filled out before they can make a reservation request. This info helps make sure hosts know who to expect, and how to contact the guest.</div><div><br></div><div>SITE_NAME’s requirements for guests include:</div><div><br></div><div>Full name</div><div>Confirmed email address</div><div>Confirmed phone number</div><div>Profile photo that shows their face</div><div>Introductory message</div><div>Agreement to house rules</div><div>Payment information</div><div>Hosts won’t see guest’s real email addresses, even after they book. Instead, hosts will see a temporary SITE_NAME email address that forwards their messages to the guest.</div>',
             'suggested'      => 'yes',
             'status'         => 'Active',
             'created_at'     => '2016-05-10 07:29:02',
             'updated_at'     => '2016-05-10 07:29:02'
            ],
            ['id'             => '11',
             'category_id'    => '5',
             'subcategory_id' => '0',
             'question'       => 'How do reviews work?',
             'answer'         => '<div>All the reviews on SITE_NAME are written by hosts and travelers from our community, so any review you see is based on a stay that a guest had in a host\'s listing.</div><div><br></div><div>Writing a review</div><div><br></div><div>To leave a review for a recent trip, go to your Reviews. Reviews are limited to 500 words and must follow SITE_NAME\'s review guidelines. You can edit your review for up to 48 hours, or until your host or guest completes their review.</div><div><br></div><div>Review history</div><div><br></div><div>To see reviews you\'ve written or reviews about you, go to your Reviews. You\'ll also see any private feedback that people have left you.</div><div><br></div><div>Our community relies on honest, transparent reviews. We will remove or alter a review if we find that it violates our review guidelines.</div>',
             'suggested'      => 'no',
             'status'         => 'Active',
             'created_at'     => '2016-05-10 07:33:40',
             'updated_at'     => '2016-05-10 07:33:40'
            ],
            ['id'             => '12',
             'category_id'    => '5',
             'subcategory_id' => '0',
             'question'       => 'What are SITE_NAME\'s review guidelines?',
             'answer'         => '<div>We believe in free speech, transparency, and clear communication. When creating a review, we ask that you stick to the facts. The best reviews provide constructive information that helps the community make better decisions.</div><div><br></div><div>SITE_NAME\'s default position is not to censor, edit, or delete reviews. However, we reserve the right to remove reviews that violate our content policy.</div><div><br></div><div>We don\'t allow:</div><div><br></div><div>Reviews that do not represent a user’s personal experience .</div><div>Reviews unrelated to the actual reservation (ex: political, religious, or social commentary).</div><div>Content that endorses or promotes illegal or harmful activity or violence, or is profane, vulgar, obscene, defamatory, threatening, or discriminatory.</div><div>Content that violates another person’s or entity’s rights, including intellectual property rights and privacy rights (ex: publishing another person’s full name, address or other identifying information without permission).</div><div>Content that is proven to be used as extortion.</div><div>Content that refers to an SITE_NAME investigation</div>',
             'suggested'      => 'no',
             'status'         => 'Active',
             'created_at'     => '2016-05-10 07:37:26',
             'updated_at'     => '2016-05-10 07:37:26'
            ],
            ['id'             => '13',
             'category_id'    => '4',
             'subcategory_id' => '9',
             'question'       => 'How do I book a place on SITE_NAME?',
             'answer'         => '<div>When you book a place on SITE_NAME, you’re making arrangements to stay in someone’s home. Each host has their own style of hospitality, starting with how they like to get to know their guests. Some hosts want to approve reservations, while others are comfortable letting you book their place instantly without waiting for approval.</div><div><br></div><div>1. Complete Your Profile</div><div><br></div><div>In either case, it’s important to know that SITE_NAME is a community that relies on trust. Complete your profile before you request a reservation with a host, so they can know a little bit about you when they confirm. Your profile should include photos and verifications, especially because some hosts require guests to have a profile photo or Verified ID in order to book.</div><div><br></div><div>2. Find the Right Place</div><div><br></div><div>With over 800,000 unique listings around the world, you’ll want to make sure the place you choose has everything you need for a comfortable and memorable trip.</div><div><br></div><div>When searching for a place, make sure to include your dates and number of guests to get the most accurate pricing. Read reviews, descriptions, house rules, and amenities for each place to see if it’s the right fit for your trip. You can always contact the host if you have any questions about their home.</div><div><br></div><div>3. Book It!</div><div><br></div><div>You’ve found the perfect place, and now it’s time to make it official. This is where the host’s preferred way of booking will determine how you’ll confirm your reservation.</div><div><br></div><div>Instant Book</div><div><br></div><div>For hosts who don’t want to approve each reservation, you’ll see a button on their listing that says Instant Book. Like the name suggests, you can confirm a reservation at these places right away. Learn more about Instant Book.</div><div><br></div><div>Request to Book</div><div><br></div><div>Many hosts prefer to approve reservations before they’re final. In this case, you’ll see a button on their listing that says Request to Book. To submit a reservation request, you’ll need to enter your payment details. Hosts have 24 hours to accept your request, and your reservation is automatically confirmed once they do. Learn more about submitting a reservation request.</div><div><br></div><div>Pre-approvals and Special Offers</div><div><br></div><div>If you decide to contact the host to ask questions before attempting to book, the host may respond to your message by inviting you to make a reservation with either a pre-approval or Special Offer. A pre-approval is an invitation to finish booking for the dates and number of guests you noted in your message. A Special Offer gives the host the opportunity to provide special pricing, dates, and other reservation details before you book. Learn more about booking a pre-approval or Special Offer.</div>',
             'suggested'      => 'no',
             'status'         => 'Active',
             'created_at'     => '2016-05-10 07:38:32',
             'updated_at'     => '2016-05-10 07:38:32'
            ],
            ['id'             => '14',
             'category_id'    => '4',
             'subcategory_id' => '10',
             'question'       => 'What is Instant Book?',
             'answer'         => 'Instant Book listings don\'t require approval from the host before you can book them. Instead, you can just choose your travel dates and discuss check-in plans with the host. There is no additional fee for confirming a reservation with Instant Book.',
             'suggested'      => 'no',
             'status'         => 'Active',
             'created_at'     => '2016-05-10 07:42:43',
             'updated_at'     => '2016-05-10 07:42:43'
            ],
            ['id'             => '15',
             'category_id'    => '4',
             'subcategory_id' => '10',
             'question'       => 'What is a pre-approval?',
             'answer'         => '<div>A pre-approval is a way for host to let guests know that their listing is available when asked about a potential reservation. Once pre-approved, the guest can automatically confirm a booking for the specific dates provided.</div><div><br></div><div>Hosts</div><div><br></div><div>When you pre-approve a guest’s inquiry, you give them permission to automatically confirm a booking for specific dates. The dates won’t be blocked on your calendar, so you can pre-approve multiple guests at one time.</div><div><br></div><div>Guests have 24 hours to confirm a booking that has been pre-approved. After 24 hours, the guest can still request to book your listing with the price offered during the pre-approval, unless you remove the pre-approval. You can remove the pre-approval at any time in the message thread.</div><div><br></div><div>Guests</div><div><br></div><div>If a host has sent you a pre-approval, your booking isn’t confirmed until you’ve clicked Book It in the message thread with the host and added your payment information. Hosts can send pre-approvals to many potential guests, so if you’ve found the perfect space, make sure to complete the booking process as soon as possible.</div><div><br></div><div>You have 24 hours to accept a pre-approval before it expires. If 24 hours have passed, you can still accept the pre-approval but your host will have to approve your request before your reservation is confirmed.</div>',
             'suggested'      => 'no',
             'status'         => 'Active',
             'created_at'     => '2016-05-10 07:43:59',
             'updated_at'     => '2016-05-10 07:43:59'
            ],
            ['id'             => '16',
             'category_id'    => '4',
             'subcategory_id' => '10',
             'question'       => 'How do I submit a reservation request?',
             'answer'         => '<div>If you’re ready to book a place on SITE_NAME, you can send a request to the host to book a reservation. If you’re unsure about the listing or its availability, you can also send a message to the host.</div><div><br></div><div>To send a reservation request:</div><div><br></div><div>On a listing, click Request to Book.</div><div>If you see Instant Book, the host is allowing you to book their place instantly. Your reservation will be automatically confirmed after step 4.</div><div>Review your reservation details to make sure everything is correct.</div><div>Add your payment information, including any coupon code you may have.</div><div>Agree to the policies and terms, including the host’s cancellation policy and house rules.</div><div>Wait for the host’s response. The host has 24 hours to reply, but most reply within a few hours.</div><div>Some hosts require that you complete the Verified ID process before confirming a reservation, which allows the host to get more information about who they’re hosting in their home.</div><div><br></div><div>If your request is accepted, you’ll be charged in full for the reservation. If the host declines the request or doesn’t respond within 24 hours, no charge is made and you can try booking those dates with someone else.</div>',
             'suggested'      => 'yes',
             'status'         => 'Active',
             'created_at'     => '2016-05-10 07:51:04',
             'updated_at'     => '2016-05-10 07:51:04'
            ],
            ['id'             => '17',
             'category_id'    => '3',
             'subcategory_id' => '5',
             'question'       => 'Who can host on SITE_NAME?',
             'answer'         => '<div>Almost anyone can be a host! It\'s free to sign up and list your space. The listings available on the site are as diverse as the hosts who list them, so you can post airbeds in apartments, entire houses, rooms in bed-and-breakfasts, tree houses in the woods, boats on the water, or enchanted castles. Find out more about room types to see how to describe your space.</div>',
             'suggested'      => 'yes',
             'status'         => 'Active',
             'created_at'     => '2016-05-10 07:53:36',
             'updated_at'     => '2016-05-10 07:53:36'
            ]
        ]);
    }
}
