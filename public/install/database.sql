--
-- Table structure for table `actor_director`
--

CREATE TABLE `actor_director` (
  `id` int(11) NOT NULL,
  `ad_type` varchar(255) DEFAULT NULL,
  `ad_name` varchar(60) NOT NULL,
  `ad_slug` varchar(255) NOT NULL,
  `ad_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `actor_director`
--

INSERT INTO `actor_director` (`id`, `ad_type`, `ad_name`, `ad_slug`, `ad_image`) VALUES
(1, 'director', 'Mohit Suri', 'mohit-suri', NULL),
(2, 'actor', 'Disha Patani', 'disha-patani', NULL),
(3, 'actor', 'Sanjay Dutt', 'sanjay-dutt', NULL),
(4, 'actor', 'Varun Dhawan', 'varun-dhawan', NULL),
(5, 'actor', 'Manoj Bajpayee', 'manoj-bajpayee', NULL),
(6, 'actor', 'Samantha Ruth Prabhu', 'samantha-ruth-prabhu', NULL),
(7, 'actor', 'Priyamani', 'priyamani', NULL),
(8, 'director', 'Ayan Mukherjee', 'ayan-mukherjee', NULL),
(9, 'actor', 'Ranbir Kapoor', 'ranbir-kapoor', NULL),
(10, 'actor', 'Alia Bhatt', 'alia-bhatt', NULL),
(11, 'actor', 'Amitabh Bachchan', 'amitabh-bachchan', NULL),
(12, 'director', 'Advait Chandan', 'advait-chandan', NULL),
(13, 'actor', 'Aamir Khan', 'aamir-khan', NULL),
(14, 'actor', 'Kareena Kapoor', 'kareena-kapoor', NULL),
(15, 'actor', 'Manav Vij', 'manav-vij', NULL),
(16, 'director', 'Ryan Coogler', 'ryan-coogler', NULL),
(17, 'actor', 'Martin Freeman', 'martin-freeman', NULL),
(18, 'actor', 'Letitia Wright', 'letitia-wright', NULL),
(19, 'actor', 'Angela Bassett', 'angela-bassett', NULL),
(20, 'actor', 'Nazanin Boniadi', 'nazanin-boniadi', NULL),
(21, 'actor', 'Morfydd Clark', 'morfydd-clark', NULL),
(22, 'actor', 'Benjamin Walker', 'benjamin-walker', NULL),
(23, 'director', 'Chad Stahelski', 'chad-stahelski', NULL),
(24, 'actor', 'Keanu Reeves', 'keanu-reeves', NULL),
(25, 'actor', 'Donnie Yen', 'donnie-yen', NULL),
(26, 'actor', 'Bill Skarsgård', 'bill-skarsgard', NULL),
(27, 'director', 'Jerry', 'jerry', NULL),
(28, 'director', 'Joseph D. Sami', 'joseph-d-sami', NULL),
(29, 'actor', 'Urvashi Rautela', 'urvashi-rautela', NULL),
(30, 'actor', 'Nassar', 'nassar', NULL),
(31, 'actor', 'Saravanan Arul', 'saravanan-arul', NULL),
(32, 'director', 'Anup Bhandari', 'anup-bhandari', NULL),
(33, 'actor', 'Sudeep', 'sudeep', NULL),
(34, 'actor', 'Nirup Bhandari', 'nirup-bhandari', NULL),
(35, 'actor', 'Neetha Ashok', 'neetha-ashok', NULL),
(36, 'director', 'Puri Jagannadh', 'puri-jagannadh', NULL),
(37, 'actor', 'Vijay Deverakonda', 'vijay-deverakonda', NULL),
(38, 'actor', 'Mike Tyson', 'mike-tyson', NULL),
(39, 'actor', 'Ananya Panday', 'ananya-panday', NULL),
(40, 'director', 'James Cameron', 'james-cameron', NULL),
(41, 'actor', 'Zoe Saldana', 'zoe-saldana', NULL),
(42, 'actor', 'Michelle Yeoh', 'michelle-yeoh', NULL),
(43, 'actor', 'Kate Winslet', 'kate-winslet', NULL),
(44, 'director', 'Aanand L. Rai', 'aanand-l-rai', NULL),
(45, 'actor', 'Akshay Kumar', 'akshay-kumar', NULL),
(46, 'actor', 'Bhumi Pednekar', 'bhumi-pednekar', NULL),
(47, 'actor', 'Sadia Khateeb', 'sadia-khateeb', NULL),
(48, 'director', 'Jasmeet K Reen', 'jasmeet-k-reen', NULL),
(49, 'actor', 'Vijay Varma', 'vijay-varma', NULL),
(50, 'actor', 'Shefali Shah', 'shefali-shah', NULL),
(51, 'director', 'Ratheesh Balakrishnan Poduval', 'ratheesh-balakrishnan-poduval', NULL),
(52, 'actor', 'Kunchacko Boban', 'kunchacko-boban', NULL),
(53, 'actor', 'Vinay Forrt', 'vinay-forrt', NULL),
(54, 'actor', 'Saiju Kurup', 'saiju-kurup', NULL),
(55, 'director', 'Sarath Mandava', 'sarath-mandava', NULL),
(56, 'actor', 'Ravi Teja', 'ravi-teja', NULL),
(57, 'actor', 'Rajisha Vijayan', 'rajisha-vijayan', NULL),
(58, 'director', 'Karan Malhotra', 'karan-malhotra', NULL),
(59, 'actor', 'Vaani Kapoor', 'vaani-kapoor', NULL),
(60, 'director', 'Sukumar', 'sukumar', NULL),
(61, 'actor', 'Allu Arjun', 'allu-arjun', NULL),
(62, 'actor', 'Fahadh Faasil', 'fahadh-faasil', NULL),
(63, 'actor', 'Rashmika Mandanna', 'rashmika-mandanna', NULL),
(64, 'actor', 'Chris Pratt', 'chris-pratt', NULL),
(65, 'actor', 'Constance Wu', 'constance-wu', NULL),
(66, 'actor', 'Taylor Kitsch', 'taylor-kitsch', NULL),
(67, 'actor', 'Karl Urban', 'karl-urban', NULL),
(68, 'actor', 'Jack Quaid', 'jack-quaid', NULL),
(69, 'actor', 'Antony Starr', 'antony-starr', NULL),
(70, 'actor', 'Bobby Deol', 'bobby-deol', NULL),
(71, 'actor', 'Chandan Roy Sanyal', 'chandan-roy-sanyal', NULL),
(72, 'actor', 'Aditi Sudhir Pohankar', 'aditi-sudhir-pohankar', NULL),
(73, 'actor', 'Millie Bobby Brown', 'millie-bobby-brown', NULL),
(74, 'actor', 'Finn Wolfhard', 'finn-wolfhard', NULL),
(75, 'actor', 'Winona Ryder', 'winona-ryder', NULL),
(76, 'actor', 'Kiara Advani', 'kiara-advani', NULL),
(77, 'actor', 'Anil Kapoor', 'anil-kapoor', NULL),
(78, 'actor', 'Tisca Chopra', 'tisca-chopra', NULL),
(79, 'actor', 'Neetu Singh', 'neetu-singh', NULL),
(80, 'actor', 'Sam Worthington', 'sam-worthington', NULL),
(81, 'actor', 'Sigourney Weaver', 'sigourney-weaver', NULL),
(82, 'director', 'Siddharth Anand', 'siddharth-anand', NULL),
(83, 'actor', 'Shah Rukh Khan', 'shah-rukh-khan', NULL),
(84, 'actor', 'Deepika Padukone', 'deepika-padukone', NULL),
(85, 'actor', 'John Abraham', 'john-abraham', NULL),
(86, 'director', 'Mathukutty Xavier', 'mathukutty-xavier', NULL),
(87, 'actor', 'Manoj Pahwa', 'manoj-pahwa', NULL),
(88, 'actor', 'Sunny Kaushal', 'sunny-kaushal', NULL),
(89, 'actor', 'Raghav Binani', 'raghav-binani', NULL),
(90, 'director', 'Vasan Bala', 'vasan-bala', NULL),
(91, 'actor', 'Radhika Apte', 'radhika-apte', NULL),
(92, 'actor', 'Huma Qureshi', 'huma-qureshi', NULL),
(93, 'actor', 'Rajkummar Rao', 'rajkummar-rao', NULL),
(94, 'actor', 'Anton Lesser', 'anton-lesser', NULL),
(95, 'actor', 'Emily Beecham', 'emily-beecham', NULL),
(96, 'actor', 'Aneurin Barnard', 'aneurin-barnard', NULL),
(97, 'director', 'Shaji Kailas', 'shaji-kailas', NULL),
(98, 'actor', 'Prithviraj Sukumaran', 'prithviraj-sukumaran', NULL),
(99, 'actor', 'Vivek Oberoi', 'vivek-oberoi', NULL),
(100, 'actor', 'Samyuktha Menon', 'samyuktha-menon', NULL),
(101, 'director', 'Satram Ramani', 'satram-ramani', NULL),
(102, 'actor', 'Sonakshi Sinha', 'sonakshi-sinha', NULL),
(103, 'actor', 'Zaheer Iqbal', 'zaheer-iqbal', NULL),
(104, 'director', 'David Leitch', 'david-leitch', NULL),
(105, 'actor', 'Brad Pitt', 'brad-pitt', NULL),
(106, 'actor', 'Joey King', 'joey-king', NULL),
(107, 'actor', 'Aaron Taylor-Johnson', 'aaron-taylor-johnson', NULL),
(108, 'director', 'Aaron Nee', 'aaron-nee', NULL),
(109, 'director', 'Adam Nee', 'adam-nee', NULL),
(110, 'actor', 'Sandra Bullock', 'sandra-bullock', NULL),
(111, 'actor', 'Channing Tatum', 'channing-tatum', NULL),
(112, 'actor', 'Daniel Radcliffe', 'daniel-radcliffe', NULL),
(113, 'director', 'Taika Waititi', 'taika-waititi', NULL),
(114, 'actor', 'Chris Hemsworth', 'chris-hemsworth', NULL),
(115, 'actor', 'Natalie Portman', 'natalie-portman', NULL),
(116, 'actor', 'Christian Bale', 'christian-bale', NULL),
(117, 'director', 'Robert Eggers', 'robert-eggers', NULL),
(118, 'actor', 'Alexander Skarsgård', 'alexander-skarsgard', NULL),
(119, 'actor', 'Nicole Kidman', 'nicole-kidman', NULL),
(120, 'actor', 'Claes Bang', 'claes-bang', NULL),
(121, 'director', 'Roland Emmerich', 'roland-emmerich', NULL),
(122, 'actor', 'Halle Berry', 'halle-berry', NULL),
(123, 'actor', 'Patrick Wilson', 'patrick-wilson', NULL),
(124, 'actor', 'John Bradley', 'john-bradley', NULL),
(125, 'director', 'Matt Reeves', 'matt-reeves', NULL),
(126, 'actor', 'Robert Pattinson', 'robert-pattinson', NULL),
(127, 'actor', 'Zoë Kravitz', 'zoe-kravitz', NULL),
(128, 'actor', 'Jeffrey Wright', 'jeffrey-wright', NULL),
(129, 'director', 'Colin Trevorrow', 'colin-trevorrow', NULL),
(130, 'actor', 'Bryce Dallas Howard', 'bryce-dallas-howard', NULL),
(131, 'actor', 'Laura Dern', 'laura-dern', NULL),
(132, 'director', 'Tom George', 'tom-george', NULL),
(133, 'actor', 'Kieran Hodgson', 'kieran-hodgson', NULL),
(134, 'actor', 'Pearl Chanda', 'pearl-chanda', NULL),
(135, 'actor', 'Gregory Cox', 'gregory-cox', NULL),
(136, 'director', 'Harry Bradbeer', 'harry-bradbeer', NULL),
(137, 'actor', 'Henry Cavill', 'henry-cavill', NULL),
(138, 'actor', 'Helena Bonham Carter', 'helena-bonham-carter', NULL),
(139, 'director', 'Anthony Russo', 'anthony-russo', NULL),
(140, 'director', 'Joe Russo', 'joe-russo', NULL),
(141, 'actor', 'Ryan Gosling', 'ryan-gosling', NULL),
(142, 'actor', 'Chris Evans', 'chris-evans', NULL),
(143, 'actor', 'Ana de Armas', 'ana-de-armas', NULL),
(144, 'director', 'Sam Raimi', 'sam-raimi', NULL),
(145, 'actor', 'Benedict Cumberbatch', 'benedict-cumberbatch', NULL),
(146, 'actor', 'Elizabeth Olsen', 'elizabeth-olsen', NULL),
(147, 'actor', 'Chiwetel Ejiofor', 'chiwetel-ejiofor', NULL),
(148, 'director', 'Tarik Saleh', 'tarik-saleh', NULL),
(149, 'actor', 'Chris Pine', 'chris-pine', NULL),
(150, 'actor', 'Gillian Jacobs', 'gillian-jacobs', NULL),
(151, 'actor', 'Sander Thomas', 'sander-thomas', NULL),
(152, 'director', 'J.J. Perry', 'jj-perry', NULL),
(153, 'actor', 'Jamie Foxx', 'jamie-foxx', NULL),
(154, 'actor', 'Dave Franco', 'dave-franco', NULL),
(155, 'actor', 'Natasha Liu Bordizzo', 'natasha-liu-bordizzo', NULL),
(156, 'director', 'David Yates', 'david-yates', NULL),
(157, 'actor', 'Eddie Redmayne', 'eddie-redmayne', NULL),
(158, 'actor', 'Jude Law', 'jude-law', NULL),
(159, 'actor', 'Ezra Miller', 'ezra-miller', NULL),
(160, 'director', 'Wes Craven', 'wes-craven', NULL),
(161, 'actor', 'Neve Campbell', 'neve-campbell', NULL),
(162, 'actor', 'Courteney Cox', 'courteney-cox', NULL),
(163, 'actor', 'David Arquette', 'david-arquette', NULL),
(164, 'director', 'Henry Joost', 'henry-joost', NULL),
(165, 'director', 'Ariel Schulman', 'ariel-schulman', NULL),
(166, 'actor', 'Owen Wilson', 'owen-wilson', NULL),
(167, 'actor', 'Michael Peña', 'michael-pena', NULL),
(168, 'actor', 'Walker Scobell', 'walker-scobell', NULL),
(169, 'director', 'Anees Bazmee', 'anees-bazmee', NULL),
(170, 'actor', 'Tabu', 'tabu', NULL),
(171, 'actor', 'Kartik Aaryan', 'kartik-aaryan', NULL),
(172, 'director', 'Divyang Thakkar', 'divyang-thakkar', NULL),
(173, 'actor', 'Ranveer Singh', 'ranveer-singh', NULL),
(174, 'actor', 'Shalini Pandey', 'shalini-pandey', NULL),
(175, 'actor', 'Boman Irani', 'boman-irani', NULL),
(176, 'director', 'Faraz Haider', 'faraz-haider', NULL),
(177, 'actor', 'Divyendu Sharma', 'divyendu-sharma', NULL),
(178, 'actor', 'Anupriya Goenka', 'anupriya-goenka', NULL),
(179, 'actor', 'Anant Vidhaat Sharma', 'anant-vidhaat-sharma', NULL),
(180, 'actor', 'Iman Vellani', 'iman-vellani', NULL),
(181, 'actor', 'Matt Lintz', 'matt-lintz', NULL),
(182, 'actor', 'Zenobia Shroff', 'zenobia-shroff', NULL),
(183, 'actor', 'John Cena', 'john-cena', NULL),
(184, 'actor', 'Danielle Brooks', 'danielle-brooks', NULL),
(185, 'actor', 'Freddie Stroma', 'freddie-stroma', NULL),
(186, 'actor', 'Ralph Macchio', 'ralph-macchio', NULL),
(187, 'actor', 'William Zabka', 'william-zabka', NULL),
(188, 'actor', 'Courtney Henggeler', 'courtney-henggeler', NULL),
(189, 'actor', 'Elizabeth Mitchell', 'elizabeth-mitchell', NULL),
(190, 'actor', 'Morris Chestnut', 'morris-chestnut', NULL),
(191, 'actor', 'Joel Gretsch', 'joel-gretsch', NULL),
(192, 'actor', 'Ewan McGregor', 'ewan-mcgregor', NULL),
(193, 'actor', 'Moses Ingram', 'moses-ingram', NULL),
(194, 'actor', 'Vivien Lyra Blair', 'vivien-lyra-blair', NULL),
(195, 'actor', 'Shriya Pilgaonkar', 'shriya-pilgaonkar', NULL),
(196, 'actor', 'Varun Mitra', 'varun-mitra', NULL),
(197, 'actor', 'Namrata Sheth', 'namrata-sheth', NULL),
(198, 'actor', 'Ajay Devgn', 'ajay-devgn', NULL),
(199, 'actor', 'Raashi Khanna', 'raashi-khanna', NULL),
(200, 'actor', 'Esha Deol', 'esha-deol', NULL),
(201, 'actor', 'Pratik Gandhi', 'pratik-gandhi', NULL),
(202, 'actor', 'Richa Chadha', 'richa-chadha', NULL),
(203, 'actor', 'Ashutosh Rana', 'ashutosh-rana', NULL),
(204, 'actor', 'Rose Leslie', 'rose-leslie', NULL),
(205, 'actor', 'Theo James', 'theo-james', NULL),
(206, 'actor', 'Everleigh McDonell', 'everleigh-mcdonell', NULL),
(207, 'actor', 'Taron Egerton', 'taron-egerton', NULL),
(208, 'actor', 'Paul Walter Hauser', 'paul-walter-hauser', NULL),
(209, 'actor', 'Greg Kinnear', 'greg-kinnear', NULL),
(210, 'actor', 'Pedro Maurizi', 'pedro-maurizi', NULL),
(211, 'actor', 'Mora Fisz', 'mora-fisz', NULL),
(212, 'actor', 'Tomás Kirzner', 'tomas-kirzner', NULL),
(213, 'actor', 'Melissa Navia', 'melissa-navia', NULL),
(214, 'actor', 'Anson Mount', 'anson-mount', NULL),
(215, 'actor', 'Ethan Peck', 'ethan-peck', NULL),
(216, 'actor', 'Ismael Cruz Cordova', 'ismael-cruz-cordova', NULL),
(217, 'actor', 'Charlie Vickers', 'charlie-vickers', NULL),
(218, 'director', 'Brett Ratner', 'brett-ratner', NULL),
(219, 'actor', 'Nicolas Cage', 'nicolas-cage', NULL),
(220, 'actor', 'Téa Leoni', 'tea-leoni', NULL),
(221, 'actor', 'Don Cheadle', 'don-cheadle', NULL),
(222, 'actor', 'Pankaj Tripathi', 'pankaj-tripathi', NULL),
(223, 'actor', 'Kirti Kulhari', 'kirti-kulhari', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_ads`
--

CREATE TABLE `app_ads` (
  `id` int(11) NOT NULL,
  `ads_name` varchar(255) DEFAULT NULL,
  `ads_info` text DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_ads`
--

INSERT INTO `app_ads` (`id`, `ads_name`, `ads_info`, `status`) VALUES
(1, 'Admob', '{\"publisher_id\":\"pub-3940256099942544\",\"banner_on_off\":\"1\",\"banner_id\":\"ca-app-pub-3940256099942544\\/6300978111\",\"interstitial_on_off\":\"1\",\"interstitial_id\":\"ca-app-pub-3940256099942544\\/1033173712\",\"interstitial_clicks\":\"2\",\"native_on_off\":\"0\",\"native_id\":\"ca-app-pub-3940256099942544\\/2247696110\",\"native_position\":\"2\"}', 0),
(2, 'StartApp', '{\"publisher_id\":\"203601319\",\"banner_on_off\":\"1\",\"banner_id\":\"\",\"interstitial_on_off\":\"1\",\"interstitial_id\":\"\",\"interstitial_clicks\":\"2\",\"native_on_off\":\"1\",\"native_id\":\"\",\"native_position\":\"2\"}', 0),
(3, 'Facebook', '{\"publisher_id\":\"\",\"banner_on_off\":\"1\",\"banner_id\":\"IMG_16_9_APP_INSTALL#932987606893395_932988046893351\",\"interstitial_on_off\":\"1\",\"interstitial_id\":\"IMG_16_9_APP_INSTALL#932987606893395_932990020226487\",\"interstitial_clicks\":\"5\",\"native_on_off\":\"1\",\"native_id\":\"nid\",\"native_position\":\"2\"}', 0),
(4, 'AppLovin\\\'s MAX', '{\"publisher_id\":\"\",\"banner_on_off\":\"1\",\"banner_id\":\"3221a2640039c8a8\",\"interstitial_on_off\":\"1\",\"interstitial_id\":\"06b9bf27824eb7f6\",\"interstitial_clicks\":\"2\",\"native_on_off\":\"0\",\"native_id\":\"06b9bf27824eb7f6\",\"native_position\":\"2\"}', 0),
(5, 'Wortise', '{\"publisher_id\":\"c2f94dbb-e29a-4a95-bbf9-fbf860c428b3\",\"banner_on_off\":\"0\",\"banner_id\":\"test-banner\",\"interstitial_on_off\":\"0\",\"interstitial_id\":\"test-interstitial\",\"interstitial_clicks\":\"2\",\"native_on_off\":\"0\",\"native_id\":\"f78f3300-dc1b-4ece-b85b-2bc5ecbca8bb\",\"native_position\":\"3\"}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `channels_list`
--

CREATE TABLE `channels_list` (
  `id` int(11) NOT NULL,
  `channel_cat_id` int(11) NOT NULL,
  `channel_access` varchar(255) NOT NULL DEFAULT 'Paid',
  `channel_name` varchar(255) NOT NULL,
  `channel_slug` varchar(255) NOT NULL,
  `channel_description` text DEFAULT NULL,
  `channel_thumb` varchar(255) NOT NULL,
  `channel_url_type` varchar(255) NOT NULL,
  `channel_url` varchar(500) NOT NULL,
  `channel_url2` varchar(500) DEFAULT NULL,
  `channel_url3` varchar(500) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(500) DEFAULT NULL,
  `seo_keyword` varchar(500) DEFAULT NULL,
  `views` bigint(20) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `channels_list`
--

INSERT INTO `channels_list` (`id`, `channel_cat_id`, `channel_access`, `channel_name`, `channel_slug`, `channel_description`, `channel_thumb`, `channel_url_type`, `channel_url`, `channel_url2`, `channel_url3`, `seo_title`, `seo_description`, `seo_keyword`, `views`, `status`) VALUES
(1, 2, 'Paid', 'Live Tv', 'live-tv', '<p>NDTV.com provides latest news from India and around the world. Get breaking news alerts from India and follow today&rsquo;s live news updates in field of politics, business, technology, Bollywood, cricket and more.</p>', 'upload/images/N-NDTV.png', 'hls', 'https://ndtv24x7elemarchana.akamaized.net/hls/live/2003678/ndtv24x7/ndtv24x7master.m3u8', 'https://ndtv24x7elemarchana.akamaized.net/hls/live/2003678/ndtv24x7/ndtv24x7master.m3u8', 'https://ndtv24x7elemarchana.akamaized.net/hls/live/2003678/ndtv24x7/ndtv24x7master.m3u8', '', '', '', 27, 1),
(2, 2, 'Free', 'ABP Asmita', 'abp-asmita', '<p>ABP Asmita is an Indian 24-hour regional news channel broadcasting in the Gujarati language. It operates from Ahmedabad, Gujarat. It is owned by ABP Group. The channel was launched on 1 January 2016.</p>', 'upload/images/ABP_Asmita.jpg', 'hls', 'https://abplivetv.akamaized.net/hls/live/2043010/hindi/master.m3u8', 'https://ndtv24x7elemarchana.akamaized.net/hls/live/2003678/ndtv24x7/ndtv24x7master.m3u8', NULL, '', '', '', 19, 1),
(3, 3, 'Free', '9XM', '9xm', '<p>9XM</p>', 'upload/images/9xm_logo.png', 'hls', 'https://d2q8p4pe5spbak.cloudfront.net/bpk-tv/9XM/9XM.isml/index.m3u8', NULL, NULL, '', '', '', 2, 1),
(4, 2, 'Free', 'ABP News', 'abp-news', '<p>ABP News is an Indian Hindi-language free-to-air television news channel owned by ABP Group. The news channel was launched in 1998 originally as STAR News before being acquired by ABP Group. It won the Best Hindi News Channel award in the 21st edition of the Indian Television Academy Awards in 2022.</p>', 'upload/images/abp_hindi.jpg', 'hls', 'https://abplivetv.akamaized.net/hls/live/2043010/hindi/master.m3u8', NULL, NULL, '', '', '', 0, 1),
(5, 1, 'Free', 'BBC  (MPEG)', 'bbc-mpeg', '<p>The British Broadcasting Corporation is the national broadcaster of the United Kingdom, based at Broadcasting House in London, England.</p>', 'upload/images/bbc_news_logo.jpg', 'dash', 'https://bitmovin-a.akamaihd.net/content/playhouse-vr/mpds/105560.mpd', NULL, NULL, '', '', '', 38, 1),
(6, 2, 'Free', 'Aaj Tak', 'aaj-tak', '<p>Aaj Tak is an Indian Hindi-language news channel owned by TV Today Network, part of the New Delhi-based media conglomerate Living Media group</p>', 'upload/images/aaj_tak_live.jpg', 'hls', 'https://lmil.live-s.cdn.bitgravity.com/cdn-live/_definst_/lmil/live/aajtak_app.smil/playlist.m3u8', NULL, NULL, '', '', '', 1, 1),
(7, 3, 'Free', 'Mastiii', 'mastiii', '<p>Mastiii is a Hindi language free to air music television channel. Launched by TV Vision, which is a fully owned subsidiary.</p>', 'upload/images/mastiii_live_tv.jpg', 'hls', 'https://d2q8p4pe5spbak.cloudfront.net/bpk-tv/9XM/9XM.isml/index.m3u8', NULL, NULL, '', '', '', 0, 1),
(8, 2, 'Free', 'Sky News', 'sky-news', '<p>In March 2000, <strong>Sky News Active</strong>, a 24-hour interactive service providing headlines and other services which ranged from weather, the top story of the day, and showbiz on demand, was launched.</p>', 'upload/images/sky-news-logo.jpg', 'hls', 'https://siloh.pluto.tv/lilo/production/SkyNews/master.m3u8', NULL, NULL, '', '', '', 0, 1),
(9, 1, 'Free', '&TV', 'tv', '<p>And TV (stylized as &amp;TV) is a Hindi language entertainment channel owned by Zee Entertainment Enterprises. Launched as a general entertainment channel from ZEEL group, it started broadcasting on 2 March 2015.[1] On 1 June 2019, &amp;TV closed down in the UK due to the launch of ZEE5; Zee TV and ZEE5 will air most of its former programmes.</p>', 'upload/images/&tv_Logo.jpg', 'hls', 'https://d2q8p4pe5spbak.cloudfront.net/bpk-tv/9XM/9XM.isml/index.m3u8', NULL, NULL, '', '', '', 1, 1),
(10, 3, 'Free', 'MTV Music', 'mtv-music', '<p>MTV Music is a British pay television channel operated by Paramount Networks UK &amp; Australia. The brand was first launched in the UK and Ireland before launching in Australia, New Zealand, Italy, the Netherlands and Poland. Unlike other MTV Music channels, This channel offers subtitles on selected programmes.</p>', 'upload/images/MTV_Music_Logo.jpg', 'hls', 'https://d2q8p4pe5spbak.cloudfront.net/bpk-tv/9XM/9XM.isml/index.m3u8', NULL, NULL, '', '', '', 0, 1),
(11, 1, 'Free', 'Sony Sab', 'sony-sab', '<p>Sony SAB was launched as SAB TV by Gautam Adhikari and Markand Adhikari under their company Sri Adhikari Brothers (thus the acronym) on 23 April 1999. At first, it was launched as a Hindi-language comedy channel. Sony Pictures Networks took over SAB TV in March 2005[2][3] and rebranded it as Sony SAB, with a new focus on general entertainment[4] and eventually turning itself into a youth channel. In 2008, Sony SAB changed its appeal to being a Hindi-language generalist network.</p>', 'upload/images/Sony_Entertainment_Television.jpg', 'hls', 'https://d2q8p4pe5spbak.cloudfront.net/bpk-tv/9XM/9XM.isml/index.m3u8', NULL, NULL, '', '', '', 0, 1),
(12, 5, 'Free', 'TLC India', 'tlc-india', '<p>TLC India is an Indian television channel, previously known as Discovery Travel &amp; Living. It focuses on lifestyle programmes, with topics such health, cooking and travel.</p>\r\n<p>The channel launched in October 2004 and was the first international channel launched under the \\\"Discovery Travel &amp; Living\\\" name.</p>', 'upload/images/TLC-BG-1-2.jpg', 'hls', 'https://siloh.pluto.tv/lilo/production/SkyNews/master.m3u8', NULL, NULL, '', '', '', 0, 1),
(13, 1, 'Free', 'StarPlus', 'starplus', '<p>StarPlus is an Indian Hindi language general entertainment pay television channel owned by Disney Star (formerly Star India), a subsidiary of The Walt Disney Company India. The network\\\'s programming consists of family dramas, comedies, youth-oriented reality shows, shows on crime and television films.</p>', 'upload/images/Star_Plus_HD_India.jpg', 'hls', 'https://d2q8p4pe5spbak.cloudfront.net/bpk-tv/9XM/9XM.isml/index.m3u8', NULL, NULL, '', '', '', 0, 1),
(14, 1, 'Free', 'Zee TV', 'zee-tv', '<p>Zee TV (stylised as ZEE TV) is a Hindi general entertainment pay television channel in India. It was launched on 2 October 1992, as the first privately owned TV channel in the country.[1][2] It is owned by Zee Entertainment Enterprises. Zee TV also launched in the UK in 1995.</p>', 'upload/images/Zee-TV-Logo-2011.jpg', 'hls', 'https://d2q8p4pe5spbak.cloudfront.net/bpk-tv/9XM/9XM.isml/index.m3u8', NULL, NULL, '', '', '', 2, 1),
(15, 4, 'Free', 'Sony Ten 1', 'sony-ten-1', '<p>Sony Sports Network, formerly Sony Pictures Sports Network, and also known as Sony TEN, is a group of Indian pay television sports channels owned by Culver Max Entertainment (formerly Sony Pictures Networks India).</p>\r\n<p>The original TEN Sports channel was first established on 1 April 2002 by Abdul Rahman Bukhatir. It was acquired by Essel Group in 2010, and was added to Essel\\\'s existing Zee Sports channel, launched in 2005. After the acquisition, Zee launched two new channels, TEN Cricket and TEN Golf, and rebranded Zee Sports as TEN Action.</p>\r\n<p>In August 2016, Sony Pictures Networks India acquired all of the sports channels under Zee from Essel. In 2017, the networks were formally merged with Sony\\\'s existing Sony ESPN and Sony Six channels as Sony Pictures Sports Network, with the TEN channels rebranded as Sony TEN. The channels were then rebranded as Sony Sports Network in October 2022, with all five channels now carrying the \\\"Sony Sports Ten \\\" prefix.&nbsp;</p>', 'upload/images/Sony_Ten_1.jpg', 'hls', 'https://siloh.pluto.tv/lilo/production/SkyNews/master.m3u8', NULL, NULL, '', '', '', 0, 1),
(16, 4, 'Free', 'Star Sports 1', 'star-sports-1', '<p>Star Sports (formerly ESPN Star Sports) is a group of Indian multinational pay television sports channels owned by Disney Star (formerly Star India), a subsidiary of The Walt Disney Company India. Previously a part of ESPN Star Sports with its operations based in Singapore, Star India took over the Indian business and relaunched channels under the unified Star Sports brand in 2013.</p>', 'upload/images/star_sports_1.jpg', 'hls', 'https://siloh.pluto.tv/lilo/production/SkyNews/master.m3u8', NULL, NULL, '', '', '', 1, 1),
(17, 1, 'Free', 'Sony Max', 'sony-max', '<p>Sony Max (known popularly as Set Max) is an Indian pay television entertainment channel which is a sister channel to Sony Entertainment Television, operated by Culver Max Entertainment. The channel started broadcasting on 20 July 1999[1] and is available internationally. It launched a HD simulcast version on 25 December 2015.</p>', 'upload/images/Sony_Max_Logo.jpg', 'hls', 'https://d2q8p4pe5spbak.cloudfront.net/bpk-tv/9XM/9XM.isml/index.m3u8', NULL, NULL, '', '', '', 0, 1),
(19, 1, 'Free', 'Colors TV', 'colors-tv', '<p>Colors TV is an Indian general entertainment broadcast network owned by Viacom18.[1] The network\\\'s programming consists of family dramas, comedies, youth-oriented reality shows, shows on crime and television films</p>', 'upload/images/Colors_TV.jpg', 'hls', 'https://d2q8p4pe5spbak.cloudfront.net/bpk-tv/9XM/9XM.isml/index.m3u8', NULL, NULL, '', '', '', 2, 1),
(20, 5, 'Free', 'FYI TV18', 'fyi-tv18', '<p>FYI (stylized as fyi,) is an American basic cable channel owned by A&amp;E Networks, a joint venture between the Disney Media Networks subsidiary of The Walt Disney Company and Hearst Communications (each owns 50%). The network features lifestyle programming, with a mix of reality, culinary, home renovation and makeover series.</p>\r\n<p>The network originally launched in 1998 as The Biography Channel, as an offshoot of A&amp;E and named after its television series Biography. As such, it originally featured factual programs, such as reruns of its namesake. As A&amp;E shifted its focus towards reality television and drama series, the Biography Channel became the home for several series that had been displaced by the flagship network (including Biography itself), but shifted towards reality-oriented series itself in 2007 and was rebranded as simply Bio. In 2014, the channel was rebranded as FYI.&nbsp;</p>', 'upload/images/FYI_TV18_Logo.jpg', 'hls', 'https://siloh.pluto.tv/lilo/production/SkyNews/master.m3u8', NULL, NULL, '', '', '', 0, 1),
(21, 4, 'Free', 'DD Sports', 'dd-sports', '<p>DD Sports was launched on 18 March 1998. In the beginning, it broadcast sports programmes for six hours a day, which was increased to 12 hours in 1999. From 1 June 2000, DD Sports became a \\\"round-the-clock\\\" satellite channel. It was an encrypted pay channel between 2000 and 2003, and on 15 July 2003, it became the only free-to-air sports channel in the country.[1][2]</p>\r\n<p>Besides showing live sporting events like cricket, football, and tennis, DD Sports showcases Indian sports including kabaddi and kho-kho. In addition to international sporting events, important national tournaments of hockey, football, athletics, cricket, swimming, tennis, badminton, archery, and wrestling are also telecast. The DD Sports channel also telecasts news-based programmes, sports quizzes, and personality-oriented shows.</p>', 'upload/images/DD_Sports.jpg', 'hls', 'https://siloh.pluto.tv/lilo/production/SkyNews/master.m3u8', NULL, NULL, '', '', '', 0, 1),
(22, 4, 'Free', 'Sony Six', 'sony-six', '<p>Sony SIX was launched in April 2012 by Sony Pictures Networks; initially, the channel focused on programming such as Indian Premier League cricket, UFC mixed martial arts, association football, and badminton, aiming to target a younger audience.[1][2]</p>\r\n<p>On 24 October 2022, the channel was rebranded as Sony Sports Ten 5, as part of a wider rebranding of all Culver Max Entertainment channels.</p>', 'upload/images/Sony_Six.jpg', 'hls', 'https://siloh.pluto.tv/lilo/production/SkyNews/master.m3u8', NULL, NULL, '', '', '', 7, 1),
(23, 2, 'Free', 'Al Jazeera Sky News', 'al-jazeera-sky-news', '<p>Al Jazeera (Arabic: الجزيرة, romanized: al-jazīrah, IPA: [&aelig;l (d)ʒ&aelig;ˈziːrɐ], \\\"The Peninsula\\\")[3] is a state-owned Arabic-language international radio and TV broadcaster of Qatar. It is based in Doha and operated by the media conglomerate Al Jazeera Media Network. The flagship of the network, its station identification, is Al Jazeera.</p>\r\n<p>The patent holding is a \\\"private foundation for public benefit\\\" under Qatari law.[4] Under this organizational structure, the parent receives funding from the government of Qatar but maintains its editorial independence.[5][6] In June 2017, the Saudi, Emirati, Bahraini, and Egyptian governments insisted on the closure of the entire conglomerate as one of thirteen demands made to the Government of Qatar during the Qatar diplomatic crisis.[citation needed] The channel has been criticised by some organisations as well as nations such as Saudi Arabia for being \\\"Qatari propaganda\\\".</p>', 'upload/images/sky_news.jpg', 'hls', 'https://siloh.pluto.tv/lilo/production/SkyNews/master.m3u8', NULL, NULL, '', '', '', 0, 1),
(24, 3, 'Free', 'B4U Music', 'b4u-music', '<p>B4U Music is an Indian Hindi music channel owned by the B4U Network Limited.</p>\r\n<p>The channel broadcasts a mixture of contemporary Bollywood, Indipop, Bhangra and international music. Programs include celebrity interviews, artist profiles, concerts and chart rundowns, as well as video request shows.</p>\r\n<p>There are four different versions of the channel being broadcast in the UK, North America, Africa, the Middle East and South Asia. Each feed produces a quantity of local programming which reflects the culture and tastes of the local population of the Indian diaspora and new logo on 12.12.2020.</p>', 'upload/images/b4u_music.jpg', 'hls', 'https://d2q8p4pe5spbak.cloudfront.net/bpk-tv/9XM/9XM.isml/index.m3u8', NULL, NULL, '', '', '', 2, 1),
(25, 5, 'Free', 'Food Food', 'food-food', '<p>Food is any substance consumed to provide nutritional support for an organism. Food is usually of plant, animal, or fungal origin, and contains essential nutrients, such as carbohydrates, fats, proteins, vitamins, or minerals. The substance is ingested by an organism and assimilated by the organism\\\'s cells to provide energy, maintain life, or stimulate growth. Different species of animals have different feeding behaviours that satisfy the needs of their unique metabolisms, often evolved to fill a specific ecological niche within specific geographical contexts.</p>\r\n<p>Omnivorous humans are highly adaptable and have adapted to obtain food in many different ecosystems. Historically, humans secured food through two main methods: hunting and gathering and agriculture. As agricultural technologies increased, humans settled into agriculture lifestyles with diets shaped by the agriculture opportunities in their geography. Geographic and cultural differences has led to creation of numerous cuisines and culinary arts, including a wide array of ingredients, herbs, spices, techniques, and dishes. As cultures have mixed through forces like international trade and globalization, ingredients have become more widely available beyond their geographic and cultural origins, creating a cosmopolitan exchange of different food traditions and practices.</p>', 'upload/images/food_food_logo.jpg', 'hls', 'https://siloh.pluto.tv/lilo/production/SkyNews/master.m3u8', NULL, NULL, '', '', '', 1, 1),
(26, 5, 'Free', 'Nat Geo People', 'nat-geo-people', '<p>Nat Geo People was an international pay television channel owned by National Geographic Partners, a joint venture between The Walt Disney Company (73%) and the National Geographic Society (27%).[2] Targeted at female audiences, with programming focusing on people and cultures, the channel is available in 50 countries in both linear and non-linear formats.[3]</p>\r\n<p>The channel was launched as Adventure One Channel on 1 November 1999, rebranded on 2003 as Adventure One (A1) and was later rebranded on 1 May 2007 as National Geographic Adventure, strengthening the overall Nat Geo presence.[4] All countries adopted the change, except in Europe which instead changed A1 to Nat Geo Wild.[5] Nat Geo Adventure is also a global adventure travel video and photography portal, which launched worldwide in 2009.</p>\r\n<p>Nat Geo Adventure was aimed at younger audiences, providing programming based around outdoor adventure, travel and stories involving people having fun while exploring the world.</p>\r\n<p>In early 2008, National Geographic Adventure Australia and Italy launched a new video sharing feature on their website called Blognotes.</p>\r\n<p>In 2010, Nat Geo Adventure launched its own HD feed in Asia via AsiaSat 5.</p>\r\n<p>Nat Geo Adventure Italy upgraded to HD on Sky Italia on 1 February 2012, At the time of launch (0500 UTC).</p>', 'upload/images/New_NatGeo.jpg', 'hls', 'https://siloh.pluto.tv/lilo/production/SkyNews/master.m3u8', NULL, NULL, '', '', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `channel_category`
--

CREATE TABLE `channel_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `channel_category`
--

INSERT INTO `channel_category` (`id`, `category_name`, `category_slug`, `status`) VALUES
(1, 'Entertainment', 'entertainment', 1),
(2, 'News', 'news', 1),
(3, 'Music', 'music', 1),
(4, 'Sports', 'sports', 1),
(5, 'Lifestyle', 'lifestyle', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_plan_id` int(11) NOT NULL,
  `coupon_user_limit` int(4) NOT NULL DEFAULT 0,
  `coupon_used` int(4) NOT NULL DEFAULT 0,
  `coupon_exp_date` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_access` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Paid',
  `episode_series_id` int(11) NOT NULL,
  `episode_season_id` int(11) NOT NULL,
  `video_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` int(11) DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_slug` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_quality` int(1) DEFAULT NULL,
  `video_url` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url_480` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url_720` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url_1080` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download_enable` int(1) DEFAULT NULL,
  `download_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_on_off` int(1) DEFAULT NULL,
  `subtitle_language1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_url1` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_language2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_url2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_language3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_url3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imdb_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imdb_rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imdb_votes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keyword` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` bigint(20) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`id`, `video_access`, `episode_series_id`, `episode_season_id`, `video_title`, `release_date`, `duration`, `video_description`, `video_slug`, `video_image`, `video_type`, `video_quality`, `video_url`, `video_url_480`, `video_url_720`, `video_url_1080`, `download_enable`, `download_url`, `subtitle_on_off`, `subtitle_language1`, `subtitle_url1`, `subtitle_language2`, `subtitle_url2`, `subtitle_language3`, `subtitle_url3`, `imdb_id`, `imdb_rating`, `imdb_votes`, `seo_title`, `seo_description`, `seo_keyword`, `views`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Paid', 1, 1, 'The Engram', 1656613800, '45m', '<p>In the wake of a disastrous mission overseas, Navy SEAL commander James Reece returns home with conflicting memories of the op and questions about his own culpability.</p>\r\n<p><strong>Director</strong>: Antoine Fuqua</p>\r\n<p><strong>Writer</strong>: David DiGilio, Jack Carr, Olumide Odebunmi</p>\r\n<p><strong>Actors</strong>: Chris Pratt, Constance Wu, Taylor Kitsch</p>', 'the-engram', 'upload/images/TheTerminalList-1.jpg', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8.6', NULL, '', '', '', 15, 1, NULL, '2022-11-10 08:52:37'),
(2, 'Paid', 1, 1, 'Encoding', 1656613800, '40m', '<p>Reece locks onto his first potential target, enlisting Ben\\\'s help. With his mental health in question, Katie and Reece strike up an uneasy but mutually beneficial partnership to find answers.</p>\r\n<p><strong>Director</strong>: Ellen Kuras</p>\r\n<p><strong>Writer</strong>: Jack Carr, David DiGilio, Olumide Odebunmi</p>\r\n<p><strong>Actors</strong>: Chris Pratt, Constance Wu, Taylor Kitsch</p>', 'encoding', 'upload/images/TheTerminalList-1.jpg', 'Local', 0, 'upload/files/john-wick-chapter-4.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8.0', NULL, '', '', '', 0, 1, NULL, '2022-11-01 05:54:07'),
(3, 'Paid', 2, 2, 'The Name of the Game', 1564099200, '60 min', '<p>When a Supe kills the love of his life, A/V salesman Hughie Campbell teams up with Billy Butcher, a vigilante hell-bent on punishing corrupt Supes -- and Hughie\\\'s life will never be the same again.</p>\r\n<p><strong>Director</strong>: Dan Trachtenberg</p>\r\n<p><strong>Writer</strong>: Eric Kripke, Garth Ennis, Darick Robertson</p>\r\n<p><strong>Actors</strong>: Karl Urban, Jack Quaid, Antony Starr</p>', 'the-name-of-the-game', 'upload/images/Tile_Boys.png', 'URL', 1, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'tt7775902', '8.7', '13986', '', '', '', 4, 1, NULL, '2022-11-16 10:53:46'),
(4, 'Paid', 2, 3, 'Cherry', 1564099200, '59 min', '<p>The Boys get themselves a Superhero, Starlight gets payback, Homelander gets naughty, and a Senator gets naughtier.</p>\r\n<p><strong>Director</strong>: Matt Shakman</p>\r\n<p><strong>Writer</strong>: Eric Kripke, Garth Ennis, Darick Robertson</p>\r\n<p><strong>Actors</strong>: Karl Urban, Jack Quaid, Antony Starr</p>', 'cherry', 'upload/images/Tile_Boys.png', 'Local', 0, 'upload/files/dolbycanyon_MP4.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'tt8100946', '8.5', '11545', '', '', '', 1, 1, NULL, '2022-07-26 07:01:03'),
(5, 'Paid', 2, 3, 'The Big Ride', 1599177600, '63 min', '<p>With Butcher still missing, Hughie, Mother\\\'s Milk, Frenchie, and Kimiko are now fugitives, and Homelander and Vought are more powerful than ever. But just as the Boys are about to leave the country, they are pulled back into the f...</p>\r\n<p><strong>Director</strong>: Philip Sgriccia</p>\r\n<p><strong>Writer</strong>: Eric Kripke, Garth Ennis, Darick Robertson</p>\r\n<p><strong>Actors</strong>: Karl Urban, Jack Quaid, Antony Starr</p>', 'the-big-ride', 'upload/images/Tile_Boys.png', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'tt10666364', '8.1', '9714', '', '', '', 1, 1, NULL, '2022-07-26 07:01:25'),
(6, 'Free', 3, 6, 'Pran Pratishtha', 1598553000, '40m', '<p>Pammi has always faced discrimination and tried her best to raise her voice against the system. But then, like a ray of hope, Baba Nirala comes to her. And then, a body is dug out from a construction site in a forest.</p>\r\n<p><strong>Director</strong>: N/A</p>\r\n<p><strong>Writer</strong>: Kuldeep Ruhil, Avinash Kumar, Madhvi Bhatt</p>\r\n<p><strong>Actors</strong>: Bobby Deol, Chandan Roy Sanyal, Aditi Sudhir Pohankar</p>', 'pran-pratishtha', 'upload/images/Aashram.jpg', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7.2', NULL, '', '', '', 56, 1, NULL, '2022-12-07 11:03:14'),
(7, 'Paid', 3, 6, 'Grih Pravesh', 1598572800, 'N/A', '<p>The whole town is in rage when the skeleton is discovered in the forest and Sunderlal\\\'s name comes up in the case. Ujagar Singh is assigned to the case. Pammi, on the other hand, is drawn to the magic of Baba Nirala\\\'s devotion.</p>\r\n<p><strong>Director</strong>: N/A</p>\r\n<p><strong>Writer</strong>: Kuldeep Ruhil, Avinash Kumar, Madhvi Bhatt</p>\r\n<p><strong>Actors</strong>: Bobby Deol, Chandan Roy Sanyal, Aditi Sudhir Pohankar</p>', 'grih-pravesh', 'upload/images/Aashram.jpg', 'Local', 0, 'upload/files/pexels-nothing-ahead-10505868.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'tt12988198', '7.0', '147', '', '', '', 11, 1, NULL, '2022-10-19 11:25:18'),
(8, 'Paid', 3, 7, 'Triya - Charit', 1605052800, '45m', '<p>After learning it the hard way, Tinka Singh is ready to organize the concert in Baba Kashipur Wala\\\'s ashram. Tinka Singh\\\'s concert in the ashram is a major buzz event and turns many heads towards the ashram. After the massive hit, the ashram comes into the public light and this is the best time for both CM Sunderlal and Ex-CM Hukum Singh, to make the most of it. Given the upcoming elections, the ashram soon becomes the epicenters of political discourse. While this happens during the day, baba Nirala makes sure to keep his nights busy as well.</p>\r\n<p><strong>Director</strong>: N/A</p>\r\n<p><strong>Writer</strong>: Habib Faisal</p>\r\n<p><strong>Actors</strong>: Bobby Deol, Akanksha Pandey</p>', 'triya-charit', 'upload/images/Aashram.jpg', 'Local', 0, 'upload/files/john-wick-chapter-4.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'tt13445914', '5.9', '84', '', '', '', 3, 1, NULL, '2022-12-07 11:02:36'),
(9, 'Paid', 3, 7, 'Chhadma - Vesh', 1605052800, '42m', '<p>After getting what he craves the most, baba is impressed with Babita and he makes sure to show it. He orders the Sadhvi mata to let Babita perform the morning aarti every day. On the other hand, as the Tinka Singh concert becomes ...</p>\r\n<p><strong>Director</strong>: N/A</p>\r\n<p><strong>Writer</strong>: Habib Faisal</p>\r\n<p><strong>Actors</strong>: Bobby Deol, Pulkit Kumar, Akanksha Pandey</p>', 'chhadma-vesh', 'upload/images/Aashram.jpg', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'tt13446044', '5.8', '86', '', '', '', 0, 1, NULL, NULL),
(10, 'Paid', 4, 9, 'Chapter One: The Vanishing of Will Byers', 1468540800, '47 min', '<p>At the U.S. Dept. of Energy an unexplained event occurs. Then when a young Dungeons and Dragons playing boy named Will disappears after a night with his friends, his mother Joyce and the town of Hawkins are plunged into darkness.</p>\r\n<p><strong>Director</strong>: Matt Duffer, Ross Duffer</p>\r\n<p><strong>Writer</strong>: Matt Duffer, Ross Duffer, Jessie Nickson-Lopez</p>\r\n<p><strong>Actors</strong>: Winona Ryder, David Harbour, Finn Wolfhard</p>', 'chapter-one-the-vanishing-of-will-byers', 'upload/images/stranger-things.jpg', 'Local', 0, 'upload/files/pexels-nothing-ahead-10505868.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'tt4593118', '8.5', '23130', '', '', '', 6, 1, NULL, '2022-11-01 06:36:31'),
(11, 'Paid', 4, 9, 'Chapter Two: The Weirdo on Maple Street', 1468521000, '55 min', '<p>Mike hides the mysterious girl in his house. Joyce gets a strange phone call.</p>\r\n<p><strong>Director</strong>: Matt Duffer, Ross Duffer</p>\r\n<p><strong>Writer</strong>: Matt Duffer, Ross Duffer, Jessie Nickson-Lopez</p>\r\n<p><strong>Actors</strong>: Winona Ryder, David Harbour, Finn Wolfhard</p>', 'chapter-two-the-weirdo-on-maple-street', 'upload/images/stranger-things-1.jpg', 'Local', 0, 'upload/files/john-wick-chapter-4.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8.4', NULL, '', '', '', 3, 1, NULL, '2022-11-01 06:35:11'),
(12, 'Paid', 4, 9, 'Chapter Three: Holly, Jolly', 1468521000, '51 min', '<p>An increasingly concerned Nancy looks for Barb and finds out what Jonathan\\\'s been up to. Joyce is convinced Will is trying to talk to her.</p>\r\n<p><strong>Director</strong>: Shawn Levy</p>\r\n<p><strong>Writer</strong>: Matt Duffer, Ross Duffer, Jessica Mecklenburg</p>\r\n<p><strong>Actors</strong>: Winona Ryder, David Harbour, Finn Wolfhard</p>', 'chapter-three-holly-jolly', 'upload/images/stranger-things-1.jpg', 'HLS', 0, 'http://sample.vodobox.net/skate_phantom_flex_4k/skate_phantom_flex_4k.m3u8', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8.8', NULL, '', '', '', 5, 1, NULL, '2022-11-01 06:35:04'),
(13, 'Paid', 4, 9, 'Chapter Four: The Body', 1468521000, '49 min', '<p>Refusing to believe Will is dead, Joyce tries to connect with her son. The boys give Eleven a makeover. Jonathan and Nancy form an unlikely alliance.</p>\r\n<p><strong>Director</strong>: Shawn Levy</p>\r\n<p><strong>Writer</strong>: Matt Duffer, Ross Duffer, Justin Doble</p>\r\n<p><strong>Actors</strong>: Winona Ryder, David Harbour, Finn Wolfhard</p>', 'chapter-four-the-body', 'upload/images/stranger-things-1.jpg', 'HLS', 0, 'http://playertest.longtailvideo.com/adaptive/wowzaid3/playlist.m3u8', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8.9', NULL, '', '', '', 2, 1, NULL, '2022-11-01 06:34:52'),
(14, 'Paid', 4, 9, 'Chapter Five: The Flea and the Acrobat', 1468521000, '52 min', '<p>Hopper breaks into the lab to find the truth about Will\\\'s death. The boys try to locate the \\\"gate\\\" that will take them to Will.</p>\r\n<p><strong>Director</strong>: Matt Duffer, Ross Duffer</p>\r\n<p><strong>Writer</strong>: Matt Duffer, Ross Duffer, Alison Tatlock</p>\r\n<p><strong>Actors</strong>: Winona Ryder, David Harbour, Finn Wolfhard</p>', 'chapter-five-the-flea-and-the-acrobat', 'upload/images/stranger-things-1.jpg', 'HLS', 0, 'http://playertest.longtailvideo.com/adaptive/oceans_aes/oceans_aes.m3u8', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8.7', NULL, '', '', '', 2, 1, NULL, '2022-11-01 06:34:43'),
(15, 'Paid', 4, 9, 'Chapter Six: The Monster', 1468521000, '46 min', '<p>Hopper and Joyce find the truth about the lab\\\'s experiments. After their fight, the boys look for the missing Eleven.</p>\r\n<p><strong>Director</strong>: Matt Duffer, Ross Duffer</p>\r\n<p><strong>Writer</strong>: Matt Duffer, Ross Duffer, Jessie Nickson-Lopez</p>\r\n<p><strong>Actors</strong>: Winona Ryder, David Harbour, Finn Wolfhard</p>', 'chapter-six-the-monster', 'upload/images/stranger-things-1.jpg', 'DASH', 0, 'http://dash.akamaized.net/dash264/TestCases/1a/qualcomm/1/MultiRate.mpd', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8.8', NULL, '', '', '', 2, 1, NULL, '2022-11-01 06:34:12'),
(18, 'Paid', 6, 15, 'Young Royals', 1625077800, 'N/A', '<p>Prince Wilhelm adjusts to life at his prestigious new boarding school, Hillerska, but following his heart proves more challenging than anticipated.</p>\r\n<p><strong>Director</strong>: N/A</p>\r\n<p><strong>Writer</strong>: Lisa Ambj&ouml;rn, Lars Beckung, Camilla Holter</p>\r\n<p><strong>Actors</strong>: Edvin Ryding, Omar Rudberg, Malte G&aring;rdinger</p>', 'young-royals', 'upload/images/Young-Royals-Quotes-og.jpg', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'tt14664414', '8.3', '30,647', '', '', '', 4, 1, NULL, '2022-12-07 10:52:59'),
(19, 'Paid', 5, 16, 'Blockbuster', 1667413800, 'N/A', '<p>Set in the last Blockbuster Video in America, explores what it takes and who it takes for a small business to succeed.</p>\r\n<p><strong>Director</strong>: N/A</p>\r\n<p><strong>Writer</strong>: Vanessa Ramos</p>\r\n<p><strong>Actors</strong>: Melissa Fumero, Madeleine Arthur, Randall Park</p>', 'blockbuster', 'upload/images/Blockbuster.jpg', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'tt16124614', 'N/A', 'N/A', '', '', '', 1, 1, NULL, '2022-11-07 12:26:09'),
(20, 'Paid', 7, 17, 'Ms. Marvel', 1654626600, 'N/A', '<p>New Jersey raised Kamala Khan learns she has polymorphous powers.</p>\r\n<p><strong>Director</strong>: N/A</p>\r\n<p><strong>Writer</strong>: Bisha K. Ali</p>\r\n<p><strong>Actors</strong>: Iman Vellani, Matt Lintz, Zenobia Shroff</p>', 'ms-marvel', 'upload/images/ms-marvel-season-2.jpg', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'tt10857164', '6.2', '99,439', '', '', '', 4, 1, NULL, '2022-12-07 10:52:27'),
(21, 'Paid', 8, 18, 'Peacemaker', 1642012200, 'N/A', '<p>Picking up where The Suicide Squad (2021) left off, Peacemaker returns home after recovering from his encounter with Bloodsport - only to discover that his freedom comes at a price.</p>\r\n<p><strong>Director</strong>: N/A</p>\r\n<p><strong>Writer</strong>: James Gunn</p>\r\n<p><strong>Actors</strong>: John Cena, Danielle Brooks, Freddie Stroma</p>', 'peacemaker', 'upload/images/16421073016621.jpg', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'tt13146488', '8.3', '106,870', '', '', '', 1, 1, NULL, '2022-11-07 12:37:06'),
(22, 'Paid', 9, 19, 'Cobra Kai', 1525199400, '30 min', '<p>Thirty years after their final confrontation at the 1984 All Valley Karate Tournament, Johnny Lawrence is at rock-bottom as an unemployed handyman haunted by his wasted life. However, when Johnny rescues a bullied kid, Miguel, from bullies, he is inspired to restart the notorious Cobra Kai dojo. However, this revitalization of his life and related misunderstandings find Johnny restarting his old rivalry with Daniel LaRousso, a successful businessman who may be happily married, but is missing an essential balance in life since the death of his mentor, Mr. Miyagi. Meanwhile, even as this antipathy festers, it finds itself reflected in their protegees as Miguel and his comrades are gradually poisoned by Cobra Kai\\\'s thuggish philosophy. Meanwhile, while Daniel\\\'s daughter, Samantha, finds herself in the middle of this conflict amidst false friends, Johnny\\\'s estranged miscreant son, Robby, finds himself inadvertently coming under Daniel\\\'s wing and flourishes in ways worthy of Mr. Miyagi.</p>\r\n<p><strong>Director</strong>: N/A</p>\r\n<p><strong>Writer</strong>: Josh Heald, Jon Hurwitz, Hayden Schlossberg</p>\r\n<p><strong>Actors</strong>: Ralph Macchio, William Zabka, Courtney Henggeler</p>', 'cobra-kai', 'upload/images/cobra-kai-5-cover-1.jpg', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'tt7221388', '8.5', '182,421', '', '', '', 5, 1, NULL, '2022-11-08 10:46:47'),
(23, 'Paid', 10, 20, 'Obi-Wan Kenobi', 1653589800, 'N/A', '<p>Jedi Master Obi-Wan Kenobi has to save young Leia after she is kidnapped, all the while being pursued by Imperial Inquisitors and his former Padawan, now known as Darth Vader.</p>\r\n<p><strong>Director</strong>: N/A</p>\r\n<p><strong>Writer</strong>: N/A</p>\r\n<p><strong>Actors</strong>: Ewan McGregor, Moses Ingram, Vivien Lyra Blair</p>', 'obi-wan-kenobi', 'upload/images/Obi-Wan-Kenobi.jpg', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'tt8466564', '7.1', '184,699', '', '', '', 1, 1, NULL, '2022-11-07 12:43:04'),
(24, 'Paid', 11, 21, 'Guilty Minds', 1650479400, 'N/A', '<p>Guilty Minds is a legal drama about one family that is the paragon of virtue and the other, a leading law firm dealing with all shades of grey.</p>\r\n<p><strong>Director</strong>: N/A</p>\r\n<p><strong>Writer</strong>: N/A</p>\r\n<p><strong>Actors</strong>: Shriya Pilgaonkar, Varun Mitra, Namrata Sheth</p>', 'guilty-minds', 'upload/images/Guilty-Minds-Amazon-Prime.jpg', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'tt19355272', '7.4', '2,361', '', '', '', 1, 1, NULL, '2022-11-08 10:50:22'),
(25, 'Paid', 12, 22, 'Rudra: The Edge of Darkness', 1646332200, 'N/A', '<p>In the crime-ridden streets of Mumbai, journeying through the maze of psychopathic minds is brilliant super-cop Rudra Veer Singh.</p>\r\n<p><strong>Director</strong>: N/A</p>\r\n<p><strong>Writer</strong>: N/A</p>\r\n<p><strong>Actors</strong>: Ajay Devgn, Raashi Khanna, Esha Deol</p>', 'rudra-the-edge-of-darkness', 'upload/images/89886842.jpg', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'tt14486948', '6.7', '7,888', '', '', '', 0, 1, NULL, NULL),
(26, 'Paid', 13, 23, 'The Great Indian Murder', 1643913000, '2 min', '<p>The 32-year-old Vicky Rai is one the cunning and owner of the Rai Group of Industries, he is also the son of the Home Minister of Chhattisgarh, Jagannath Rai. Vicky got murdered in cold blood at a party arranged by him to celebrate his acquittal in a rape and murder case of two shelter home girls. There are six suspects surrounding the murder and comes across the radar of the case\\\'s investigating officers DCP Sudha Bhardwaj and Suraj Yadav of Central Bureau of Investigation. Vicky\\\'s case has also put an unintended halt in his father political career that he tries to win it by fair or foul means, even after his son\\\'s death. The Great Indian Murder is about exploring several versions of a single murder, a story that Sudha and Suraj weave through their investigations. Richa Chadda, she plays the role of DCP Sudha Bhardwaj and Pratik Gandhi, who is in role of a CBI officer in The Great Indian Murder.</p>\r\n<p><strong>Director</strong>: N/A</p>\r\n<p><strong>Writer</strong>: N/A</p>\r\n<p><strong>Actors</strong>: Pratik Gandhi, Richa Chadha, Ashutosh Rana</p>', 'the-great-indian-murder', 'upload/images/The_Great_Indian_Murder.jpg', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'tt16729514', '7.1', '13,174', '', '', '', 1, 1, NULL, '2022-11-08 04:33:30'),
(27, 'Paid', 14, 24, 'The Time Traveler\\\'s Wife', 1652553000, '2 min', '<p>Tells the intricate love story of Clare and Henry, and a marriage with a problem... time travel.</p>\r\n<p><strong>Director</strong>: N/A</p>\r\n<p><strong>Writer</strong>: Steven Moffat</p>\r\n<p><strong>Actors</strong>: Rose Leslie, Theo James, Everleigh McDonell</p>', 'the-time-travelers-wife', 'upload/images/66e79-16556360953931-1920.jpg', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'tt8783930', '7.7', '13,789', '', '', '', 0, 1, NULL, NULL),
(28, 'Paid', 15, 25, 'Episode 1', 1657218600, '55 min', '<p>Jimmy Keene is sentenced to 10 years in a minimum security prison but he cuts a deal with the FBI to befriend a suspected serial killer. Keene has to elicit a confession from Larry Hall to find the bodies of as many as eighteen wo...</p>\r\n<p><strong>Director</strong>: N/A</p>\r\n<p><strong>Writer</strong>: Dennis Lehane</p>\r\n<p><strong>Actors</strong>: Taron Egerton, Paul Walter Hauser, Greg Kinnear</p>', 'episode-1', 'upload/images/Black_Bird.jpg', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8.2', NULL, '', '', '', 7, 0, NULL, '2022-11-16 11:50:37'),
(29, 'Paid', 16, 26, 'Tierra Incógnita', 1662575400, '55 min', '<p>After his parents mysteriously disappeared eight years ago, young Eric Dalaras embarks on a search for the truth and enters a frightening world. He and his sister Uma grew up with their maternal grandparents. Eric decides to leave...</p>\r\n<p><strong>Director</strong>: N/A</p>\r\n<p><strong>Writer</strong>: N/A</p>\r\n<p><strong>Actors</strong>: Pedro Maurizi, Mora Fisz, Tom&aacute;s Kirzner</p>', 'tierra-incognita', 'upload/images/Tierra_Incognita.jpg', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'tt15566204', '5.1', '260', '', '', '', 0, 1, NULL, '2022-11-10 12:04:50'),
(30, 'Free', 17, 27, 'Star Trek: Strange New Worlds', 1651689000, '50 min', '<p>A prequel to Star Trek: The Original Series, the show will follow the crew of the USS Enterprise under Captain Christopher Pike.</p>\r\n<p><strong>Director</strong>: N/A</p>\r\n<p><strong>Writer</strong>: Akiva Goldsman, Alex Kurtzman, Jenny Lumet</p>\r\n<p><strong>Actors</strong>: Melissa Navia, Anson Mount, Ethan Peck</p>', 'star-trek-strange-new-worlds', 'upload/images/p21449609_b_h9_aa.jpg', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8.2', NULL, '', '', '', 0, 1, NULL, '2022-11-10 12:04:48'),
(31, 'Free', 18, 28, 'The Lord of the Rings: Episode 1', 1661970600, '55 min', '<p>This epic drama is set thousands of years before the events of J.R.R. Tolkien&rsquo;s The Hobbit and The Lord of the Rings, and will take viewers back to an era in which great powers were forged, kingdoms rose to glory and fell to ruin, unlikely heroes were tested, hope hung by the finest of threads, and the greatest villain that ever flowed from Tolkien&rsquo;s pen threatened to cover all the world in darkness. Beginning in a time of relative peace, the series follows an ensemble cast of characters, both familiar and new, as they confront the long-feared re-emergence of evil to Middle-earth. From the darkest depths of the Misty Mountains, to the majestic forests of the elf-capital of Lindon, to the breathtaking island kingdom of N&uacute;menor, to the furthest reaches of the map, these kingdoms and characters will carve out legacies that live on long after they are gone.</p>\r\n<p><strong>Director</strong>: N/A</p>\r\n<p><strong>Writer</strong>: Patrick McKay, John D. Payne</p>\r\n<p><strong>Actors</strong>: Morfydd Clark, Ismael Cruz Cordova, Charlie Vickers</p>', 'the-lord-of-the-rings-the-rings-of-power', 'upload/images/Rings-of-power.jpg', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6.9', NULL, '', '', '', 14, 1, NULL, '2022-12-07 11:00:00'),
(32, 'Free', 19, 29, 'The Family Man - Episode 1', 977423400, '125 min', '<p>A modern-day Frank Capra story. Jack Campbell, a successful and talented businessman, is happily living his single life. He has everything, or so he thinks. One day he wakes up in a new life where he didn\\\'t leave his college girlfriend for a London trip. He\\\'s married to Kate, lives in Jersey and has two kids. He, of course, desperately wants his life back for which he has worked 13 years for. He\\\'s president of P. K. Lassiter Investment House and not a tire salesman at Big Ed\\\'s. He drives a Ferrari and not a mini-van that never starts. And most importantly he doesn\\\'t wake up in the morning with kids jumping on the bed. After a bad start, day by day he\\\'s more confident in his new life and starts to see what he\\\'s been missing. Turns out money\\\'s good to have but that\\\'s not everything.</p>\r\n<p><strong>Director</strong>: Brett Ratner</p>\r\n<p><strong>Writer</strong>: David Diamond, David Weissman</p>\r\n<p><strong>Actors</strong>: Nicolas Cage, T&eacute;a Leoni, Don Cheadle</p>', 'the-family-man', 'upload/images/The-Family-Man.jpg', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6.8', NULL, '', '', '', 1, 1, NULL, '2022-11-18 08:55:59'),
(33, 'Free', 20, 30, 'Criminal Justice: Episode 1', 1608748200, '42 min', '<p>Behind Closed Doors, the second installment of the Criminal Justice franchise, is out. While Pankaj Tripathi returns as lawyer Madhav Mishra to fight yet another case, actor Kirti Kulhari takes centre stage as Anuradha Chandra, who has been arrested for her husband\\\'s murder.</p>\r\n<p><strong>Director</strong>: N/A</p>\r\n<p><strong>Writer</strong>: Apurva Asrani, Siddharth Hirwe, Peter Moffat</p>\r\n<p><strong>Actors</strong>: Pankaj Tripathi, Kirti Kulhari, Anupriya Goenka</p>', 'criminal-justice-behind-closed-doors', 'upload/images/Criminal_Justice.jpg', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7.4', NULL, '', '', '', 18, 1, NULL, '2022-12-08 10:50:06'),
(34, 'Free', 19, 29, 'The Family Man - Episode 2', 977423400, '125 min', '<p>A modern-day Frank Capra story. Jack Campbell, a successful and talented businessman, is happily living his single life. He has everything, or so he thinks. One day he wakes up in a new life where he didn\\\'t leave his college girlfriend for a London trip. He\\\'s married to Kate, lives in Jersey and has two kids. He, of course, desperately wants his life back for which he has worked 13 years for. He\\\'s president of P. K. Lassiter Investment House and not a tire salesman at Big Ed\\\'s. He drives a Ferrari and not a mini-van that never starts. And most importantly he doesn\\\'t wake up in the morning with kids jumping on the bed. After a bad start, day by day he\\\'s more confident in his new life and starts to see what he\\\'s been missing. Turns out money\\\'s good to have but that\\\'s not everything.</p>\r\n<p><strong>Director</strong>: Brett Ratner</p>\r\n<p><strong>Writer</strong>: David Diamond, David Weissman</p>\r\n<p><strong>Actors</strong>: Nicolas Cage, T&eacute;a Leoni, Don Cheadle</p>', 'the-family-man', 'upload/images/The-Family-Man.jpg', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6.8', NULL, '', '', '', 1, 1, NULL, '2022-11-18 08:56:06'),
(35, 'Free', 20, 30, 'Criminal Justice: Episode 2', 1608748200, '45 min', '<p>Behind Closed Doors, the second installment of the Criminal Justice franchise, is out. While Pankaj Tripathi returns as lawyer Madhav Mishra to fight yet another case, actor Kirti Kulhari takes centre stage as Anuradha Chandra, who has been arrested for her husband\\\'s murder.</p>\r\n<p><strong>Director</strong>: N/A</p>\r\n<p><strong>Writer</strong>: Apurva Asrani, Siddharth Hirwe, Peter Moffat</p>\r\n<p><strong>Actors</strong>: Pankaj Tripathi, Kirti Kulhari, Anupriya Goenka</p>', 'criminal-justice-behind-closed-doors-2', 'upload/images/Criminal_Justice.jpg', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7.4', NULL, '', '', '', 14, 1, NULL, '2022-11-10 12:02:40'),
(36, 'Free', 18, 28, 'The Lord of the Rings: Episode 2', 1661970600, '58 min', '<p>This epic drama is set thousands of years before the events of J.R.R. Tolkien&rsquo;s The Hobbit and The Lord of the Rings, and will take viewers back to an era in which great powers were forged, kingdoms rose to glory and fell to ruin, unlikely heroes were tested, hope hung by the finest of threads, and the greatest villain that ever flowed from Tolkien&rsquo;s pen threatened to cover all the world in darkness. Beginning in a time of relative peace, the series follows an ensemble cast of characters, both familiar and new, as they confront the long-feared re-emergence of evil to Middle-earth. From the darkest depths of the Misty Mountains, to the majestic forests of the elf-capital of Lindon, to the breathtaking island kingdom of N&uacute;menor, to the furthest reaches of the map, these kingdoms and characters will carve out legacies that live on long after they are gone.</p>\r\n<p><strong>Director</strong>: N/A</p>\r\n<p><strong>Writer</strong>: Patrick McKay, John D. Payne</p>\r\n<p><strong>Actors</strong>: Morfydd Clark, Ismael Cruz Cordova, Charlie Vickers</p>', 'the-lord-of-the-rings-the-rings-of-power-Episode-2', 'upload/images/Rings-of-power.jpg', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6.9', NULL, '', '', '', 9, 1, NULL, '2022-12-07 10:59:31'),
(37, 'Paid', 15, 25, 'We Are Coming, Father Abraham', 1657218600, '59 min', '<p>Agent McCauley prepares Jimmy for the mission. Detective Miller questions Larry about the missing women, leading to a polygraph test.</p>\r\n<p><strong>Director</strong>: Micha&euml;l R. Roskam</p>\r\n<p><strong>Writer</strong>: Dennis Lehane, James Keene, Hillel Levin</p>\r\n<p><strong>Actors</strong>: Taron Egerton, Paul Walter Hauser, Sepideh Moafi</p>', 'we-are-coming-father-abraham', 'upload/images/Black_Bird.jpg', 'HLS', 0, 'https://playertest.longtailvideo.com/adaptive/oceans_aes/oceans_aes.m3u8', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8.0', NULL, '', '', '', 2, 1, NULL, '2022-11-18 08:55:26');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(10) UNSIGNED NOT NULL,
  `genre_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `genre_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre_name`, `genre_slug`, `status`) VALUES
(1, 'Drama', 'drama', 1),
(2, 'Action', 'action', 1),
(3, 'Comedy', 'comedy', 1),
(5, 'Thriller', 'thriller', 1),
(6, 'Horror', 'horror', 1),
(8, 'Romance', 'romance', 1),
(9, 'Adventure', 'adventure', 1),
(10, 'Sci-Fi', 'sci-fi', 1),
(11, 'Fantasy', 'fantasy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `home_sections`
--

CREATE TABLE `home_sections` (
  `id` int(11) NOT NULL,
  `section_name` varchar(500) NOT NULL,
  `section_slug` varchar(255) NOT NULL,
  `post_type` varchar(255) DEFAULT NULL,
  `movie_ids` text DEFAULT NULL,
  `show_ids` text DEFAULT NULL,
  `sport_ids` text DEFAULT NULL,
  `tv_ids` text DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_sections`
--

INSERT INTO `home_sections` (`id`, `section_name`, `section_slug`, `post_type`, `movie_ids`, `show_ids`, `sport_ids`, `tv_ids`, `status`) VALUES
(1, 'Latest Movies', 'latest-movies', 'Movie', '14,13,10,9,5,3,1,15,11,12,4', '', '', '', 1),
(2, 'Latest Shows', 'latest-shows', 'Shows', '', '18,1,10,12,20,11', '', '', 1),
(3, 'Best in Sports', 'best-in-sports', 'Sports', '', '', '7,5,4,3,2,6', '', 1),
(4, 'Live TV', 'live-tv', 'LiveTV', '', '', '', '22,19,11,10,8,6,4,2,1,25,24,26,17,14', 1),
(5, 'Popular Movies', 'popular-movies', 'Movie', '41,16,13,7,5,3,2,40,37', '', '', '', 1),
(6, 'Popular Shows', 'popular-shows', 'Shows', '', '3,1,4,10,18,19', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `language_name` varchar(60) NOT NULL,
  `language_slug` varchar(255) NOT NULL,
  `language_image` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `language_name`, `language_slug`, `language_image`, `status`) VALUES
(1, 'Hindi', 'hindi', 'hindixl_070617120630.png', 1),
(2, 'English', 'english', 'eng_cat.png', 1),
(3, 'Spanish', 'spanish', 'colored-painted.jpg', 1),
(4, 'French', 'french', NULL, 1),
(5, 'Arabic', 'arabic', NULL, 1),
(6, 'Malayalam', 'malayalam', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `movie_videos`
--

CREATE TABLE `movie_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_access` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Paid',
  `movie_lang_id` int(11) NOT NULL,
  `movie_genre_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `upcoming` int(1) NOT NULL DEFAULT 0,
  `video_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` int(11) DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actor_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `director_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_slug` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_image_thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trailer_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_quality` int(1) DEFAULT NULL,
  `video_url` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url_480` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url_720` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url_1080` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download_enable` int(1) DEFAULT NULL,
  `download_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_on_off` int(1) DEFAULT NULL,
  `subtitle_language1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_url1` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_language2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_url2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_language3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_url3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imdb_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imdb_rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imdb_votes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keyword` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` bigint(20) NOT NULL DEFAULT 0,
  `content_rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movie_videos`
--

INSERT INTO `movie_videos` (`id`, `video_access`, `movie_lang_id`, `movie_genre_id`, `upcoming`, `video_title`, `release_date`, `duration`, `video_description`, `actor_id`, `director_id`, `video_slug`, `video_image_thumb`, `video_image`, `trailer_url`, `video_type`, `video_quality`, `video_url`, `video_url_480`, `video_url_720`, `video_url_1080`, `download_enable`, `download_url`, `subtitle_on_off`, `subtitle_language1`, `subtitle_url1`, `subtitle_language2`, `subtitle_url2`, `subtitle_language3`, `subtitle_url3`, `imdb_id`, `imdb_rating`, `imdb_votes`, `seo_title`, `seo_description`, `seo_keyword`, `views`, `content_rating`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Free', 1, '2,8,5', 1, 'Ek Villain Returns', 1659052800, '2h 10m', '<p>8 years after Rakesh Mahadkar reigned terror on Mumbai, another serial killer has taken birth. More brutal and more dangerous but one that uses the same cover, the Smiley Mask. Ek Villain Returns is the story of two men in one sid...</p>\r\n<p><strong>Director</strong>: Mohit Suri</p>\r\n<p><strong>Writer</strong>: Aseem Arrora, Kanika Dhillon</p>\r\n<p><strong>Actors</strong>: Disha Patani, Sanjay Dutt, Varun Dhawan</p>\r\n<p><strong>Production</strong>: N/A</p>', '2,3,4', '1', 'ek-villain-returns', 'upload/images/Ek-Villain-Returns.jpg', 'upload/images/Ek_Villain_Returns_900X600.jpg', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', NULL, 'Ek Villain Returns', 'Ek Villain Returns', 'Ek Villain, Ek Villain Returns', 17, '16+', 1, NULL, '2022-10-08 06:26:46'),
(2, 'Paid', 1, '2,9,11', 0, 'Brahmastra Part One: Shiva', 1662661800, '2H', '<p>This is the story of Shiva who sets out in search of love and self-discovery. During his journey, he has to face many evil forces that threaten our existence.</p>\r\n<p><strong>Director</strong>: Ayan Mukherjee</p>\r\n<p><strong>Writer</strong>: Hussain Dalal, Ayan Mukherjee</p>\r\n<p><strong>Actors</strong>: Ranbir Kapoor, Alia Bhatt, Amitabh Bachchan</p>\r\n<p><strong>Production</strong>: N/A</p>', '10,11,9', '8', 'brahmastra-part-one-shiva', 'upload/images/Brahmastra_Part_One_270X390.jpg', 'upload/images/Brahmastra_Part_One_1280X720.jpg', 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', 'HLS', 0, 'https://playertest.longtailvideo.com/adaptive/oceans_aes/oceans_aes.m3u8', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 0, '16+', 1, NULL, '2022-11-10 10:59:07'),
(3, 'Paid', 1, '3,1', 1, 'Laal Singh Chaddha', 1660156200, '2M 10S', '<p>An official remake of the 1994 American film Forrest Gump</p>\r\n<p><strong>Director</strong>: Advait Chandan</p>\r\n<p><strong>Writer</strong>: Atul Kulkarni</p>\r\n<p><strong>Actors</strong>: Aamir Khan, Kareena Kapoor, Manav Vij</p>\r\n<p><strong>Production</strong>: N/A</p>', '13,14,15', '12', 'laal-singh-chaddha', 'upload/images/Laal_Singh_Chaddha_270X390.jpg', 'upload/images/Laal_Singh_Chaddha_1280X720.jpg', 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 3, '16+', 1, NULL, '2022-11-10 10:57:06'),
(4, 'Free', 2, '2,9,1', 1, 'Black Panther: Wakanda Forever', 1668105000, '2m 12s', '<p>A sequel that will continue to explore the world of Wakanda and all the characters introduced in the 2018 film.</p>\r\n<p><strong>Director</strong>: Ryan Coogler</p>\r\n<p><strong>Writer</strong>: Joe Robert Cole, Ryan Coogler</p>\r\n<p><strong>Actors</strong>: Martin Freeman, Letitia Wright, Angela Bassett</p>\r\n<p><strong>Production</strong>: N/A</p>', '19,18,17', '16', 'black-panther-wakanda-forever', 'upload/images/MV5BYjJlMjBmYzUtY2E3MC00OWI1LWE1YmUtOTdmM2IyMTQyZDBjXkEyXkFqcGdeQXVyODk4OTc3MTY@._V1_SX300.jpg', 'upload/images/black_panther.jpg', 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 93, NULL, 1, NULL, '2022-11-10 10:56:56'),
(5, 'Paid', 2, '2,5', 0, 'John Wick: Chapter 4', 1679616000, '1h 25m', '<p><strong>Director</strong>: Chad Stahelski</p>\r\n<p><strong>Writer</strong>: Michael Finch, Shay Hatten, Derek Kolstad</p>\r\n<p><strong>Actors</strong>: Keanu Reeves, Donnie Yen, Bill Skarsg&aring;rd</p>\r\n<p><strong>Production</strong>: N/A</p>', '26,25,24', '23', 'john-wick-chapter-4', 'upload/images/JohnWick2.jpg', 'upload/images/JohnWick.jpg', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', 'Local', 0, 'upload/files/john-wick-chapter-4.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 1, '16+', 1, NULL, '2022-07-26 05:22:52'),
(6, 'Free', 1, '2,1', 1, 'The Legend', 1658946600, 'N/A', '<p>N/A</p>\r\n<p><strong>Director</strong>: Jerry, Joseph D. Sami</p>\r\n<p><strong>Writer</strong>: Pattukottai Prabhakar</p>\r\n<p><strong>Actors</strong>: Urvashi Rautela, Nassar, Saravanan Arul</p>\r\n<p><strong>Production</strong>: N/A</p>', '30,31,29', '27,28', 'the-legend', 'upload/images/MV5BYzYyNTM0YzktNWVmOS00NWNiLWEyODItYTkwNDIwMzgzNTE5XkEyXkFqcGdeQXVyMTEzNzg0Mjkx._V1_SX300.jpg', 'upload/images/The_Legend_1280X720.jpg', 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', NULL, '', '', '', 0, NULL, 1, NULL, '2022-11-10 10:56:25'),
(7, 'Free', 1, '2,9,1', 1, 'VR (Vikrant Rona)', 1658946600, '135 min', '<p>Almost half a century ago, a remote village in the middle of a tropical rainforest starts witnessing a series of unexplainable events which they attribute to the supernatural.</p>\r\n<p><strong>Director</strong>: Anup Bhandari</p>\r\n<p><strong>Writer</strong>: Anup Bhandari, John Mahendran</p>\r\n<p><strong>Actors</strong>: Sudeep, Nirup Bhandari, Neetha Ashok</p>\r\n<p><strong>Production</strong>: N/A</p>', '35,34,33', '32', 'vr-vikrant-rona', 'upload/images/MV5BODUwZmU5MmYtN2UwOS00ZjI1LWE4OTQtNGFmYTllY2JmZjU1XkEyXkFqcGdeQXVyMzU0ODc1MTQ@._V1_SX300.jpg', 'upload/images/vikrantrona_posterart_1280X720.jpg', 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 1, '16+', 1, NULL, '2022-11-10 10:53:13'),
(8, 'Free', 1, '2,1,8', 1, 'Liger', 1661365800, NULL, '<p>Movie is a boxing-based film in which Vijay Deverakonda plays a fighter.</p>\r\n<p><strong>Director</strong>: Puri Jagannadh</p>\r\n<p><strong>Writer</strong>: Puri Jagannadh, A.R. Sreedhar, Kiran Thatavarthi</p>\r\n<p><strong>Actors</strong>: Vijay Deverakonda, Mike Tyson, Ananya Panday</p>\r\n<p><strong>Production</strong>: N/A</p>', '39,38,37', '36', 'liger', 'upload/images/MV5BODhjZTU5ZmItMTYxNy00NjU5LWE4OTItNTliMTMxZmEzOTc3XkEyXkFqcGdeQXVyMTI1NDAzMzM0._V1_SX300.jpg', 'upload/images/Liger_1280X720.jpg', 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 1, '16+', 1, NULL, '2022-11-10 10:53:10'),
(9, 'Paid', 2, '2,9,10', 0, 'Avatar: The Way of Water', 1671148800, NULL, '<p>Jake Sully lives with his newfound family formed on the planet of Pandora. Once a familiar threat returns to finish what was previously started, Jake must work with Neytiri and the army of the Na\\\'vi race to protect their planet.</p>\r\n<p><strong>Director</strong>: James Cameron</p>\r\n<p><strong>Writer</strong>: James Cameron, Josh Friedman</p>\r\n<p><strong>Actors</strong>: Zoe Saldana, Michelle Yeoh, Kate Winslet</p>\r\n<p><strong>Production</strong>: N/A</p>', '43,42,41', '40', 'avatar-the-way-of-water', 'upload/images/Avatar_2_270X390.jpg', 'upload/images/Avatar2.jpg', 'https://videoportal.viavilab.com/upload/files/dolbycanyon_MP4.mp4', 'Local', 0, 'upload/files/Avtar2.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 19, '16+', 1, NULL, '2022-12-07 12:01:25'),
(10, 'Free', 1, '3,1', 1, 'Raksha Bandhan', -19800, '130 min', '<p>A story on the purest relationship ever.</p>\r\n<p><strong>Director</strong>: Aanand L. Rai</p>\r\n<p><strong>Writer</strong>: Kanika Dhillon, Himanshu Sharma</p>\r\n<p><strong>Actors</strong>: Akshay Kumar, Bhumi Pednekar, Sadia Khateeb</p>\r\n<p><strong>Production</strong>: N/A</p>', '45,46,47', '44', 'raksha-bandhan', 'upload/images/Raksha_Bandhan_270X390.jpg', 'upload/images/Raksha_Bandhan_1280X720.jpg', 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 9, '13+', 1, NULL, '2022-12-07 12:03:48'),
(11, 'Free', 1, '3,1', 1, 'Darlings', 1659637800, '133 min', '<p>It follows the lives of two women as they find courage and love in exceptional circumstances.</p>\r\n<p><strong>Director</strong>: Jasmeet K Reen</p>\r\n<p><strong>Writer</strong>: Parveez Sheikh, Jasmeet K Reen, Vijay Maurya</p>\r\n<p><strong>Actors</strong>: Alia Bhatt, Vijay Varma, Shefali Shah</p>\r\n<p><strong>Production</strong>: N/A</p>', '10,50,49', '48', 'darlings', 'upload/images/Darlings_270X390.jpg', 'upload/images/Darlings_1280X720.jpg', 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 1, '16+', 1, NULL, '2022-11-10 10:50:50'),
(12, 'Free', 1, '2,1,5', 1, 'Rama Rao on Duty', 1655424000, '2h 10m', '<p>N/A</p>\r\n<p><strong>Director</strong>: Sarath Mandava</p>\r\n<p><strong>Writer</strong>: Sarath Mandava</p>\r\n<p><strong>Actors</strong>: Ravi Teja, Rajisha Vijayan, Nassar</p>\r\n<p><strong>Production</strong>: N/A</p>', '56,57,30', '55', 'rama-rao-on-duty', 'upload/images/Rama_Rao_on_Duty_270X390.jpg', 'upload/images/Rama_Rao_on_Duty_1280X720.jpg', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 7, '16+', 1, NULL, '2022-12-06 12:36:38'),
(13, 'Paid', 1, '2,9,1', 0, 'Shamshera (Quality)', 1658428200, '178 min', '<p>In the fictitious city of Kaza, a warrior tribe is imprisoned, enslaved &amp; tortured by a ruthless authoritarian Shudh Singh. Shamshera is the a legend for his tribe who relentlessly fights for his tribe\\\'s freedom &amp; dignity.</p>\r\n<p><strong>Director</strong>: Karan Malhotra</p>\r\n<p><strong>Writer</strong>: Khila Bisht, Karan Malhotra, Piyush Mishra</p>\r\n<p><strong>Actors</strong>: Ranbir Kapoor, Vaani Kapoor, Sanjay Dutt</p>\r\n<p><strong>Production</strong>: N/A</p>', '9,3,59', '58', 'shamshera-quality', 'upload/images/Shamshera_270X390.jpg', 'upload/images/Shamshera_1280X720.jpg', 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', 'URL', 1, 'https://videoportal.viavilab.com/upload/images/Shamshera Official Trailer _ Ranbir Kapoor _ Sanjay Dutt _ Vaani Kapoor _ Karan .mp4', 'https://videoportal.viavilab.com/upload/images/Shamshera Official Trailer _ Ranbir Kapoor _ Sanjay Dutt _ Vaani Kapoor _ Karan .mp4', 'https://videoportal.viavilab.com/upload/images/Shamshera Official Trailer _ Ranbir Kapoor _ Sanjay Dutt _ Vaani Kapoor _ Karan .mp4', 'https://videoportal.viavilab.com/upload/images/Shamshera Official Trailer _ Ranbir Kapoor _ Sanjay Dutt _ Vaani Kapoor _ Karan .mp4', 1, 'https://videoportal.viavilab.com/upload/images/Shamshera Official Trailer _ Ranbir Kapoor _ Sanjay Dutt _ Vaani Kapoor _ Karan .mp4', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7.6', NULL, '', '', '', 31, '16+', 1, NULL, '2022-12-07 12:00:53'),
(14, 'Free', 1, '2,9', 0, 'Pushpa: The Rise - Part 1', 1641493800, '179 min', '<p>Pushpa a labor works for small sum but dreams of living a life of king. But he is always let down by his step brothers for being an illegitimate child of their father. He gets chance to work in dense forest of red sanders where red sanders are smuggled to other countries. The labors are always under the scanner of DSP Govindappa but Pushpa dares to go against everyone creating hurdles for DSP. Pushpa manages to save a smuggling consignment worth crores under the eye of DSP and becomes known to Reddy Brothers. (Konda Reddy, Jakka Reddy and Jolly Reddy) known to do smuggling of red sanders. Pushpa manages to smuggle red sanders often with his tricks by bluffing DSP and his team and becomes close side of Konda Reddy. Pushpa changes his lifestyle and decides to marry Srivelli but his step brothers disclose his mother\\\'s relationship with their father thus calling of the marriage. Pushpa who now decides not to stop in reaching heights and finds that Mangalam Sinu, a syndicate member is giving Reddy\\\'s gang much lesser share than they deserve and asks Konda Reddy to hike profit. Konda Reddy asks Pushpa to take thing sin his hands as his involvement will lead to war between the two gangs.A fearless Pushpa decides to take control of things leading to disagreements between two gangs.</p>\r\n<p><strong>Director</strong>: Sukumar</p>\r\n<p><strong>Writer</strong>: Sukumar, Srikanth Vissa, Hussain Sha Kiran</p>\r\n<p><strong>Actors</strong>: Allu Arjun, Fahadh Faasil, Rashmika Mandanna</p>\r\n<p><strong>Production</strong>: N/A</p>', '61,62,63', '60', 'pushpa-the-rise-part-1', 'upload/images/pushpa_270X390.jpg', 'upload/images/pushpa_800X450.jpg', NULL, 'Local', 0, 'upload/files/Avtar2.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7.6', NULL, '', '', '', 40, '16+', 1, NULL, '2022-12-12 05:04:11'),
(15, 'Paid', 1, '2,9,11', 1, 'Jugjugg Jeeyo', 1656009000, NULL, '<p>This is the story of Shiva who sets out in search of love and self-discovery. During his journey, he has to face many evil forces that threaten our existence.</p>\r\n<p><strong>Director</strong>: Ayan Mukherjee</p>\r\n<p><strong>Writer</strong>: Hussain Dalal, Ayan Mukherjee</p>\r\n<p><strong>Actors</strong>: Ranbir Kapoor, Alia Bhatt, Amitabh Bachchan</p>\r\n<p><strong>Production</strong>: N/A</p>', '77,76,4', '28,60', 'jugjugg-jeeyo', 'upload/images/jugjugg_jeeyo_small.jpg', 'upload/images/jugjugg_jeeyo.jpg', 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 4, NULL, 1, NULL, '2022-12-07 12:04:31'),
(16, 'Free', 1, '2,9,3', 1, 'Major', 1663266600, NULL, '<p>This is the story of Shiva who sets out in search of love and self-discovery. During his journey, he has to face many evil forces that threaten our existence.</p>\r\n<p><strong>Director</strong>: Ayan Mukherjee</p>\r\n<p><strong>Writer</strong>: Hussain Dalal, Ayan Mukherjee</p>\r\n<p><strong>Actors</strong>: Ranbir Kapoor, Alia Bhatt, Amitabh Bachchan</p>\r\n<p><strong>Production</strong>: N/A</p>', '39,18', '32,23', 'major', 'upload/images/Major_Small.jpg', 'upload/images/Major.jpg', 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 28, NULL, 1, NULL, '2022-12-08 05:16:36'),
(17, 'Paid', 1, '9,1,5', 1, 'Samrat Prithviraj', 1663266600, NULL, '<p>This is the story of Shiva who sets out in search of love and self-discovery. During his journey, he has to face many evil forces that threaten our existence.</p>\r\n<p><strong>Director</strong>: Ayan Mukherjee</p>\r\n<p><strong>Writer</strong>: Hussain Dalal, Ayan Mukherjee</p>\r\n<p><strong>Actors</strong>: Ranbir Kapoor, Alia Bhatt, Amitabh Bachchan</p>\r\n<p><strong>Production</strong>: N/A</p>', '45', '8', 'samrat-prithviraj', 'upload/images/Prithviraj_Small.jpg', 'upload/images/Prithviraj-Poster.jpg', 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 67, NULL, 1, NULL, '2022-12-10 12:10:52'),
(19, 'Free', 1, '2,1', 0, 'Pathaan', 1674585000, '146 min', '<p>RAW Agent codenamed Pathaan takes on a menacing villain who is hell bent on ripping apart India\\\'s security apparatus.</p>\r\n<p><strong>Director</strong>: Siddharth Anand</p>\r\n<p><strong>Writer</strong>: Siddharth Anand</p>\r\n<p><strong>Actors</strong>: Shah Rukh Khan, Deepika Padukone, John Abraham</p>\r\n<p><strong>Production</strong>: N/A</p>', '84,85,83', '82', 'pathaan', 'upload/images/dd854292adde351e75f00f2654319255.jpg', 'upload/images/pathaan.jpg', NULL, 'HLS', 0, 'https://playertest.longtailvideo.com/adaptive/oceans_aes/oceans_aes.m3u8', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', NULL, '', '', '', 3, NULL, 1, NULL, '2022-12-09 10:40:11'),
(20, 'Paid', 1, '5', 0, 'Mili', 1667500200, '127 min', '<p>Janhvi Kapoor as a woman stuck in a freezer fighting to stay alive. \\\'Mili\\\' is the official Hindi remake of the Malayalam thriller \\\'Helen\\\'.</p>\r\n<p><strong>Director</strong>: Mathukutty Xavier</p>\r\n<p><strong>Writer</strong>: Mathukutty Xavier</p>\r\n<p><strong>Actors</strong>: Manoj Pahwa, Sunny Kaushal, Raghav Binani</p>\r\n<p><strong>Production</strong>: N/A</p>', '87,89,88', '86', 'mili', 'upload/images/mili_small.jpg', 'upload/images/mili.jpg', NULL, 'Local', 0, 'upload/files/Dharavi_Bank.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', NULL, '', '', '', 1, NULL, 1, NULL, '2022-11-10 10:46:38'),
(21, 'Free', 1, '3,1', 0, 'Monica, O My Darling', 1668105000, '129 min', '<p>Which a young man desperately tries to make it big with some unlikely allies and a dastardly diabolical plan to pull off the perfect murder.</p>\r\n<p><strong>Director</strong>: Vasan Bala</p>\r\n<p><strong>Writer</strong>: Yogesh Chandekar</p>\r\n<p><strong>Actors</strong>: Radhika Apte, Huma Qureshi, Rajkummar Rao</p>\r\n<p><strong>Production</strong>: N/A</p>', '92,91,93', '90', 'monica-o-my-darling', 'upload/images/monica_small.jpg', 'upload/images/maxresdefault.jpg', NULL, 'Local', 0, 'upload/files/pexels-nothing-ahead-10505868.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', NULL, '', '', '', 0, NULL, 1, NULL, '2022-11-10 10:46:25'),
(22, 'Paid', 2, '1,6', 0, '1899', 1668623400, '56S min', '<p>The whole European angle was very important for us, not only story wise but also the way we were going to produce it. It really had to be a European collaboration, not just cast but also crew. We felt that with the past years of Europe being on the decline, we wanted to give a counterpoint to Brexit, and to nationalism rising in different countries, to go back to that idea of Europe and Europeans working and creating together.</p>\r\n<p><strong>Director</strong>: N/A</p>\r\n<p><strong>Writer</strong>: Baran bo Odar, Jantje Friese</p>\r\n<p><strong>Actors</strong>: Anton Lesser, Emily Beecham, Aneurin Barnard</p>\r\n<p><strong>Production</strong>:</p>', '96,94,95', NULL, '1899', 'upload/images/1899_small.jpg', 'upload/images/1899.jpg', NULL, 'Embed', 0, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ivIwdQBlS10\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9.3', NULL, '', '', '', 1, NULL, 1, NULL, '2022-11-10 10:45:37'),
(23, 'Free', 6, '2,1,5', 0, 'Kaduva', 1657132200, '155 min', '<p>The film is set in the late 90s revolving around the life of a young high range rubber planter from Mundakayam and his rivalry with a high ranking officer in the Kerala Police.</p>\r\n<p><strong>Director</strong>: Shaji Kailas</p>\r\n<p><strong>Writer</strong>: Jinu Abraham</p>\r\n<p><strong>Actors</strong>: Prithviraj Sukumaran, Vivek Oberoi, Samyuktha Menon</p>\r\n<p><strong>Production</strong>: N/A</p>', '98,100,99', '97', 'kaduva', 'upload/images/kaduva_small.jpg', 'upload/images/kadva_202273.jpg', NULL, 'Local', 0, 'upload/files/Dharavi_Bank.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6.1', NULL, '', '', '', 0, NULL, 1, NULL, '2022-11-10 10:45:27'),
(24, 'Paid', 1, '1', 0, 'Double XL', 1667500200, '128 min', '<p>The journey of two plus-size women Rajshree Trivedi from Meerut and Saira Khanna from New Delhi as they navigate society\\\'s beauty standards.</p>\r\n<p><strong>Director</strong>: Satram Ramani</p>\r\n<p><strong>Writer</strong>: Mudassar Aziz, Sasha Singh</p>\r\n<p><strong>Actors</strong>: Sonakshi Sinha, Huma Qureshi, Zaheer Iqbal</p>\r\n<p><strong>Production</strong>: N/A</p>', '92,102,103', '101', 'double-xl', 'upload/images/double_xl_small.jpg', 'upload/images/double_xl.jpg', NULL, 'Embed', 0, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ivIwdQBlS10\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', NULL, '', '', '', 0, NULL, 1, NULL, '2022-11-10 10:44:47'),
(25, 'Free', 2, '2,3,5', 0, 'Bullet Train', 1659637800, '127 min', '<p>Trained killer Ladybug wants to give up the life but is pulled back in by his handler Maria Beetle in order to collect a briefcase on a bullet train heading from Tokyo to Morioka. On board are fellow assasins Kimura, the Prince, Tangerine, and Lemon. Once on board the five assasins discover that their objectives are all connected.</p>\r\n<p><strong>Director</strong>: David Leitch</p>\r\n<p><strong>Writer</strong>: Zak Olkewicz, K&ocirc;tar&ocirc; Isaka</p>\r\n<p><strong>Actors</strong>: Brad Pitt, Joey King, Aaron Taylor-Johnson</p>\r\n<p><strong>Production</strong>: N/A</p>', '107,105,106', '104', 'bullet-train', 'upload/images/Bullet_Train_Small.jpg', 'upload/images/Bullet_Train.jpg', NULL, 'Local', 0, 'upload/files/Thor_ Love and Thunder _ Official.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7.4', NULL, '', '', '', 0, NULL, 1, NULL, '2022-11-10 10:44:14'),
(26, 'Paid', 2, '2,9,3', 0, 'The Lost City', 1648146600, '112 min', '<p>A reclusive romance novelist on a book tour with her cover model gets swept up in a kidnapping attempt that lands them both in a cutthroat jungle adventure.</p>\r\n<p><strong>Director</strong>: Aaron Nee, Adam Nee</p>\r\n<p><strong>Writer</strong>: Oren Uziel, Dana Fox, Adam Nee</p>\r\n<p><strong>Actors</strong>: Sandra Bullock, Channing Tatum, Daniel Radcliffe</p>\r\n<p><strong>Production</strong>: N/A</p>', '111,112,110', '108,109', 'the-lost-city', 'upload/images/The_Lost_City_Small.jpg', 'upload/images/The_Lost_City.jpg', NULL, 'HLS', 0, 'https://playertest.longtailvideo.com/adaptive/oceans_aes/oceans_aes.m3u8', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6.1', NULL, '', '', '', 0, NULL, 1, NULL, '2022-11-10 10:43:49'),
(27, 'Free', 2, '2,9,3', 0, 'Thor: Love and Thunder', 1657218600, '118 min', '<p>Thor enlists the help of Valkyrie, Korg and ex-girlfriend Jane Foster to fight Gorr the God Butcher, who intends to make the gods extinct.</p>\r\n<p><strong>Director</strong>: Taika Waititi</p>\r\n<p><strong>Writer</strong>: Taika Waititi, Jennifer Kaytin Robinson, Stan Lee</p>\r\n<p><strong>Actors</strong>: Chris Hemsworth, Natalie Portman, Christian Bale</p>\r\n<p><strong>Production</strong>: N/A</p>', '114,116,115', '113', 'thor-love-and-thunder', 'upload/images/Thor_Love_and_Thunder_Small.jpg', 'upload/images/Thor_Love_and_Thunder.jpg', NULL, 'Local', 0, 'upload/files/Thor_ Love and Thunder _ Official.mp4', NULL, NULL, NULL, 0, NULL, 1, 'English', 'https://videoportal.viavilab.com/upload/test.vtt', NULL, NULL, NULL, NULL, NULL, '6.4', NULL, '', '', '', 16, NULL, 1, NULL, '2022-12-08 12:00:36'),
(28, 'Paid', 2, '2,9,1', 0, 'The Northman', 1650565800, '137 min', '<p>A young Viking prince is on a quest to avenge his father\\\'s murder.</p>\r\n<p><strong>Director</strong>: Robert Eggers</p>\r\n<p><strong>Writer</strong>: Sj&oacute;n, Robert Eggers</p>\r\n<p><strong>Actors</strong>: Alexander Skarsg&aring;rd, Nicole Kidman, Claes Bang</p>\r\n<p><strong>Production</strong>: N/A</p>', '118,120,119', '117', 'the-northman', 'upload/images/The_Northman_Small.jpg', 'upload/images/The_Northman.jpg', NULL, 'HLS', 0, 'https://playertest.longtailvideo.com/adaptive/oceans_aes/oceans_aes.m3u8', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7.1', NULL, '', '', '', 0, NULL, 1, NULL, '2022-11-10 10:43:34'),
(29, 'Free', 2, '2,9,10', 0, 'Moonfall', 1643913000, '130 min', '<p>In Moonfall, a mysterious force knocks the Moon from its orbit around Earth and sends it hurtling on a collision course with life as we know it. With mere weeks before impact and the world on the brink of annihilation, NASA executive and former astronaut Jo Fowler is convinced she has the key to saving us all - but only one astronaut from her past, Brian Harper and a conspiracy theorist K.C. Houseman believe her. These unlikely heroes will mount an impossible last-ditch mission into space, leaving behind everyone they love, only to find that they just might have prepared for the wrong mission.</p>\r\n<p><strong>Director</strong>: Roland Emmerich</p>\r\n<p><strong>Writer</strong>: Roland Emmerich, Harald Kloser, Spenser Cohen</p>\r\n<p><strong>Actors</strong>: Halle Berry, Patrick Wilson, John Bradley</p>\r\n<p><strong>Production</strong>: N/A</p>', '122,124,123', '121', 'moonfall', 'upload/images/movieposter_en.jpg', 'upload/images/moonfall-bg-own.jpg', NULL, 'Embed', 0, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ivIwdQBlS10\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5.1', NULL, '', '', '', 1, NULL, 1, NULL, '2022-11-10 10:42:23'),
(30, 'Paid', 2, '2,1', 0, 'The Batman', 1646332200, '176 min', '<p>When a sadistic serial killer begins murdering key political figures in Gotham, Batman is forced to investigate the city\\\'s hidden corruption and question his family\\\'s involvement.</p>\r\n<p><strong>Director</strong>: Matt Reeves</p>\r\n<p><strong>Writer</strong>: Matt Reeves, Peter Craig, Bob Kane</p>\r\n<p><strong>Actors</strong>: Robert Pattinson, Zo&euml; Kravitz, Jeffrey Wright</p>\r\n<p><strong>Production</strong>: N/A</p>', '128,126,127', '125', 'the-batman', 'upload/images/the_batman_small.jpg', 'upload/images/the_batman.jpg', NULL, 'HLS', 0, 'https://playertest.longtailvideo.com/adaptive/oceans_aes/oceans_aes.m3u8', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7.9', NULL, '', '', '', 0, NULL, 1, NULL, '2022-11-10 10:33:12'),
(31, 'Free', 2, '2,9,10', 0, 'Jurassic World Dominion', 1654799400, '147 min', '<p>Four years after the destruction of Isla Nublar, dinosaurs now live--and hunt--alongside humans all over the world. This fragile balance will reshape the future and determine, once and for all, whether human beings are to remain the apex predators on a planet they now share with history\\\'s most fearsome creatures.</p>\r\n<p><strong>Director</strong>: Colin Trevorrow</p>\r\n<p><strong>Writer</strong>: Emily Carmichael, Colin Trevorrow, Derek Connolly</p>\r\n<p><strong>Actors</strong>: Chris Pratt, Bryce Dallas Howard, Laura Dern</p>\r\n<p><strong>Production</strong>: N/A</p>', '130,64,131', '129', 'jurassic-world-dominion', 'upload/images/Jurassic_World_Dominion_Small.jpg', 'upload/images/Jurassic_World_Dominion.jpg', NULL, 'HLS', 0, 'https://playertest.longtailvideo.com/adaptive/oceans_aes/oceans_aes.m3u8', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5.7', NULL, '', '', '', 0, NULL, 1, NULL, '2022-11-10 10:33:05'),
(32, 'Paid', 2, '3', 0, 'See How They Run', 1663266600, '98 min', '<p>A desperate Hollywood film producer sets out to turn a popular play into a film. When members of the production are murdered, world-weary Inspector Stoppard and rookie Constable Stalker find themselves in the midst of a puzzling whodunit.</p>\r\n<p><strong>Director</strong>: Tom George</p>\r\n<p><strong>Writer</strong>: Mark Chappell</p>\r\n<p><strong>Actors</strong>: Kieran Hodgson, Pearl Chanda, Gregory Cox</p>\r\n<p><strong>Production</strong>: N/A</p>', '135,133,134', '132', 'see-how-they-run', 'upload/images/See_How_They_Run_Small.jpg', 'upload/images/See_How_They_Run.jpg', NULL, 'HLS', 0, 'https://playertest.longtailvideo.com/adaptive/oceans_aes/oceans_aes.m3u8', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6.7', NULL, '', '', '', 1, NULL, 1, NULL, '2022-11-10 10:32:45'),
(33, 'Free', 2, '2,9', 0, 'Enola Holmes 2', 1667500200, 'N/A', '<p>Now a detective-for-hire, Enola Holmes takes on her first official case to find a missing girl as the sparks of a dangerous conspiracy ignite a mystery that requires the help of friends - and Sherlock himself - to unravel</p>\r\n<p><strong>Director</strong>: Harry Bradbeer</p>\r\n<p><strong>Writer</strong>: Jack Thorne, Nancy Springer, Harry Bradbeer</p>\r\n<p><strong>Actors</strong>: Millie Bobby Brown, Henry Cavill, Helena Bonham Carter</p>\r\n<p><strong>Production</strong>: N/A</p>', '138,137,73', '136', 'enola-holmes-2', 'upload/images/Enola_Holmes_2_Small.jpg', 'upload/images/Enola_Holmes_2.jpg', NULL, 'URL', 0, 'https://playertest.longtailvideo.com/adaptive/oceans_aes/oceans_aes.m3u8', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', NULL, '', '', '', 0, NULL, 1, NULL, '2022-11-10 10:32:37'),
(34, 'Paid', 2, '2,5', 0, 'The Gray Man', 1658428200, '122 min', '<p>Count Gentry aka, Sierra Six a highly skilled former CIA Operative, was once the agency\\\'s best merchant of death. After his escape from prison, and recruitment by former handler Donald Fitzroy, Gentry is now on the run from the CIA with agent Lloyd Hansen hot on his trail. Aided by Agent Dani Miranda, Hansen will stop at nothing to bring Gentry down.</p>\r\n<p><strong>Director</strong>: Anthony Russo, Joe Russo</p>\r\n<p><strong>Writer</strong>: Joe Russo, Christopher Markus, Stephen McFeely</p>\r\n<p><strong>Actors</strong>: Ryan Gosling, Chris Evans, Ana de Armas</p>\r\n<p><strong>Production</strong>: N/A</p>', '143,142,141', '139,140', 'the-gray-man', 'upload/images/The_Gray_Man_Small.jpg', 'upload/images/The_Gray_Man.jpg', NULL, 'HLS', 0, 'https://playertest.longtailvideo.com/adaptive/oceans_aes/oceans_aes.m3u8', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6.5', NULL, '', '', '', 0, NULL, 1, NULL, '2022-11-10 10:31:47'),
(35, 'Free', 2, '2,9,11', 0, 'Doctor Strange in the Multiverse of Madness', 1651775400, '126 min', '<p>After the events of Avengers: Endgame, Dr. Stephen Strange continues his research on the Time Stone. But an old friend turned enemy seeks to destroy every sorcerer on Earth, messing with Strange\\\'s plan, causing him to unleash an unspeakable evil</p>\r\n<p><strong>Director</strong>: Sam Raimi</p>\r\n<p><strong>Writer</strong>: Michael Waldron, Stan Lee, Steve Ditko</p>\r\n<p><strong>Actors</strong>: Benedict Cumberbatch, Elizabeth Olsen, Chiwetel Ejiofor</p>\r\n<p><strong>Production</strong>: N/A</p>', '145,147,146', '144', 'doctor-strange-in-the-multiverse-of-madness', 'upload/images/Doctor_Strange_Small.jpg', 'upload/images/Doctor_Strange.jpg', NULL, 'Local', 1, 'upload/files/Thor_ Love and Thunder _ Official.mp4', 'upload/files/pexels-nothing-ahead-10505868.mp4', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7.0', NULL, '', '', '', 2, NULL, 1, NULL, '2022-11-10 10:31:01'),
(36, 'Paid', 2, '2,5', 0, 'The Contractor', 1648751400, '103 min', '<p>After being involuntarily discharged from the U.S. Special Forces, James Harper (Pine) decides to support his family by joining a private contracting organization alongside his best friend (Foster) and under the command of a fellow veteran (Sutherland). Overseas on a covert mission, Harper must evade those trying to kill him while making his way back home.</p>\r\n<p><strong>Director</strong>: Tarik Saleh</p>\r\n<p><strong>Writer</strong>: J.P. Davis</p>\r\n<p><strong>Actors</strong>: Chris Pine, Gillian Jacobs, Sander Thomas</p>\r\n<p><strong>Production</strong>: N/A</p>', '149,150,151', '148', 'the-contractor', 'upload/images/The_Contractor_Small.jpg', 'upload/images/contractor.jpg', NULL, 'HLS', 0, 'https://playertest.longtailvideo.com/adaptive/oceans_aes/oceans_aes.m3u8', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5.8', NULL, '', '', '', 1, NULL, 1, NULL, '2022-11-10 10:30:59'),
(37, 'Free', 2, '2,3,11', 0, 'Day Shift', 1660242600, '113 min', '<p>A hard-working, blue-collar dad just wants to provide a good life for his quick-witted 10-year-old daughter. His mundane San Fernando Valley pool cleaning job is a front for his real source of income: hunting and killing vampires.</p>\r\n<p><strong>Director</strong>: J.J. Perry</p>\r\n<p><strong>Writer</strong>: Tyler Tice, Shay Hatten</p>\r\n<p><strong>Actors</strong>: Jamie Foxx, Dave Franco, Natasha Liu Bordizzo</p>\r\n<p><strong>Production</strong>: N/A</p>', '154,153,155', '152', 'day-shift', 'upload/images/Day_Shift_Small.jpg', 'upload/images/Day_Shift.jpg', NULL, 'Local', 0, 'upload/files/Avtar2.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6.1', NULL, '', '', '', 1, NULL, 1, NULL, '2022-11-10 10:29:52'),
(38, 'Paid', 2, '9,11', 0, 'Fantastic Beasts: The Secrets of Dumbledore', 1649961000, '142 min', '<p>Professor Albus Dumbledore knows the powerful Dark wizard Gellert Grindelwald is moving to seize control of the wizarding world. Unable to stop him alone, he entrusts Magizoologist Newt Scamander to lead an intrepid team of wizards, witches and one brave Muggle baker on a dangerous mission, where they encounter old and new beasts and clash with Grindelwald\\\'s growing legion of followers. But with the stakes so high, how long can Dumbledore remain on the sidelines? (Warner Bros media release)</p>\r\n<p><strong>Director</strong>: David Yates</p>\r\n<p><strong>Writer</strong>: J.K. Rowling, Steve Kloves</p>\r\n<p><strong>Actors</strong>: Eddie Redmayne, Jude Law, Ezra Miller</p>\r\n<p><strong>Production</strong>: N/A</p>', '157,159,158', '156', 'fantastic-beasts-the-secrets-of-dumbledore', 'upload/images/Fantastic_Beasts_The_Secrets_of_Dumbledore_Small.jpg', 'upload/images/Fantastic_Beasts_The_Secrets_of_Dumbledore.jpg', NULL, 'HLS', 0, 'https://playertest.longtailvideo.com/adaptive/oceans_aes/oceans_aes.m3u8', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6.2', NULL, '', '', '', 5, NULL, 1, NULL, '2022-11-10 10:28:20'),
(39, 'Free', 2, '6', 0, 'Scream', 851020200, '111 min', '<p>A year after her mother\\\'s death, Sidney Prescott (Neve Campbell) and her friends started experiencing some strange phone calls. They later learned the calls were coming from a crazed serial killer, in a white faced mask and a large black robe, looking for revenge. His phone calls usually consist of many questions, the main one being: What\\\'s your favorite scary movie? Along with much scary movie trivia, ending with bloody pieces of innocent lives scattered around the small town of Woodsboro.</p>\r\n<p><strong>Director</strong>: Wes Craven</p>\r\n<p><strong>Writer</strong>: Kevin Williamson</p>\r\n<p><strong>Actors</strong>: Neve Campbell, Courteney Cox, David Arquette</p>\r\n<p><strong>Production</strong>: N/A</p>', '162,163,161', '160', 'scream', 'upload/images/scream_small.jpg', 'upload/images/scream.jpg', NULL, 'Embed', 0, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/beToTslH17s\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7.4', NULL, '', '', '', 16, NULL, 1, NULL, '2022-11-10 11:08:01'),
(40, 'Paid', 2, '2,9,3', 0, 'Secret Headquarters', 1659637800, '104 min', '<p>While hanging out after school, Charlie and his friends discover the headquarters of the world\\\'s most powerful superhero hidden beneath his home. When villains attack, they must team up to defend the headquarters and save the world.</p>\r\n<p><strong>Director</strong>: Henry Joost, Ariel Schulman</p>\r\n<p><strong>Writer</strong>: Christopher L. Yost, Josh Koenigsberg, Henry Joost</p>\r\n<p><strong>Actors</strong>: Owen Wilson, Michael Pe&ntilde;a, Walker Scobell</p>\r\n<p><strong>Production</strong>: N/A</p>', '167,166,168', '165,164', 'secret-headquarters', 'upload/images/Secret_Headquarters_Small.jpg', 'upload/images/Secret_Headquarters.jpg', 'https://videoportal.viavilab.com/upload/files/john-wick-chapter-4.mp4', 'Local', 1, 'upload/files/Dharavi_Bank.mp4', 'upload/files/john-wick-chapter-4.mp4', NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5.0', NULL, '', '', '', 2, NULL, 1, NULL, '2022-11-10 10:22:19'),
(41, 'Free', 1, '3,6', 0, 'Bhool Bhulaiyaa 2', 1652985000, '143 min', '<p>When strangers Reet and Ruhan cross paths, their journey leads to an abandoned mansion and a dreaded spirit who has been trapped for 18 years.</p>\r\n<p><strong>Director</strong>: Anees Bazmee</p>\r\n<p><strong>Writer</strong>: Aakash Kaushik, Farhad Samji</p>\r\n<p><strong>Actors</strong>: Tabu, Kartik Aaryan, Kiara Advani</p>\r\n<p><strong>Production</strong>: N/A</p>', '171,76,170', '169', 'bhool-bhulaiyaa-2', 'upload/images/Bhool_Bhulaiyaa_Small.jpg', 'upload/images/bhool-bhulaiyaa-2-trailer-the-box-office-001.jpg', NULL, 'URL', 0, 'https://videoportal.viavilab.com/upload/files/john-wick-chapter-4.mp4', NULL, NULL, NULL, 0, NULL, 1, 'English', 'https://videoportal.viavilab.com/upload/test.vtt', NULL, NULL, NULL, NULL, NULL, '5.7', NULL, '', '', '', 3, NULL, 1, NULL, '2022-11-10 10:19:45'),
(42, 'Paid', 1, '3,1', 0, 'Jayeshbhai Jordaar', 1652380200, '121 min', '<p>A timid Jayesh must defy his patriarchal family as he flees with his wife to save their unborn daughter from foeticide.</p>\r\n<p><strong>Director</strong>: Divyang Thakkar</p>\r\n<p><strong>Writer</strong>: Anckur Chaudhry, Divyang Thakkar</p>\r\n<p><strong>Actors</strong>: Ranveer Singh, Shalini Pandey, Boman Irani</p>\r\n<p><strong>Production</strong>: N/A</p>', '175,173,174', '172', 'jayeshbhai-jordaar', 'upload/images/Jayeshbhai_Jordaar_Small.jpg', 'upload/images/Jayeshbhai_Jordaar.jpg', NULL, 'Local', 0, 'upload/files/Dharavi_Bank.mp4', NULL, NULL, NULL, 0, NULL, 1, 'English', 'https://videoportal.viavilab.com/upload/test.vtt', NULL, NULL, NULL, NULL, NULL, '6.0', NULL, '', '', '', 17, NULL, 1, NULL, '2022-11-30 06:33:02'),
(43, 'Free', 1, '3,1', 0, 'Mere Desh Ki Dharti', 1651775400, '111 min', '<p>A humorous yet inspirational take on the lives and journey of young engineers Ajay and his friend Sameer from being abject urban failures to icons of rural India.</p>\r\n<p><strong>Director</strong>: Faraz Haider</p>\r\n<p><strong>Writer</strong>: Shrikant Bhasi, Neel Chakraborty, Faraz Haider</p>\r\n<p><strong>Actors</strong>: Divyendu Sharma, Anupriya Goenka, Anant Vidhaat Sharma</p>\r\n<p><strong>Production</strong>: N/A</p>', '179,178,177', '176', 'mere-desh-ki-dharti', 'upload/images/Mere_Desh_Ki_Dharti_Small.jpg', 'upload/images/Mere_Desh_Ki_Dharti.jpg', 'https://videoportal.viavilab.com/upload/files/Avtar2.mp4', 'Local', 0, 'upload/files/pexels-nothing-ahead-10505868.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7.0', NULL, '', '', '', 2, NULL, 1, NULL, '2022-11-10 09:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `page_title` varchar(500) NOT NULL,
  `page_slug` varchar(500) NOT NULL,
  `page_content` text NOT NULL,
  `page_order` int(3) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_title`, `page_slug`, `page_content`, `page_order`, `status`) VALUES
(1, 'About Us', 'about-us', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \\\"de Finibus Bonorum et Malorum\\\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \\\"Lorem ipsum dolor sit amet..\\\", comes from a line in section 1.10.32.</p>', 1, 1),
(2, 'Terms Of Use', 'terms-of-use', '<p><strong>Use of this site is provided by Demos subject to the following Terms and Conditions:</strong><br />1. Your use constitutes acceptance of these Terms and Conditions as at the date of your first use of the site.<br />2. Demos reserves the rights to change these Terms and Conditions at any time by posting changes online. Your continued use of this site after changes are posted constitutes your acceptance of this agreement as modified.<br />3. You agree to use this site only for lawful purposes, and in a manner which does not infringe the rights, or restrict, or inhibit the use and enjoyment of the site by any third party.<br />4. This site and the information, names, images, pictures, logos regarding or relating to Demos are provided &ldquo;as is&rdquo; without any representation or endorsement made and without warranty of any kind whether express or implied. In no event will Demos be liable for any damages including, without limitation, indirect or consequential damages, or any damages whatsoever arising from the use or in connection with such use or loss of use of the site, whether in contract or in negligence.<br />5. Demos does not warrant that the functions contained in the material contained in this site will be uninterrupted or error free, that defects will be corrected, or that this site or the server that makes it available are free of viruses or bugs or represents the full functionality, accuracy and reliability of the materials.<br />6. Copyright restrictions: please refer to our Creative Commons license terms governing the use of material on this site.<br />7. Demos takes no responsibility for the content of external Internet Sites.<br />8. Any communication or material that you transmit to, or post on, any public area of the site including any data, questions, comments, suggestions, or the like, is, and will be treated as, non-confidential and non-proprietary information.<br />9. If there is any conflict between these Terms and Conditions and rules and/or specific terms of use appearing on this site relating to specific material then the latter shall prevail.<br />10. These terms and conditions shall be governed and construed in accordance with the laws of England and Wales. Any disputes shall be subject to the exclusive jurisdiction of the Courts of England and Wales.<br />11. If these Terms and Conditions are not accepted in full, the use of this site must be terminated immediately.</p>', 2, 1),
(3, 'Privacy Policy', 'privacy-policy', '<h4><strong>Privacy Policy of&nbsp;<span class=\\\"highlight preview_company_name\\\">Company Name</span></strong></h4>\r\n<p><span class=\\\"highlight preview_company_name\\\">Company Name</span>&nbsp;operates the&nbsp;<span class=\\\"highlight preview_website_name\\\">Website Name</span>&nbsp;website, which provides the SERVICE.</p>\r\n<p>This page is used to inform website visitors regarding our policies with the collection, use, and disclosure of Personal Information if anyone decided to use our Service, the&nbsp;<span class=\\\"highlight preview_website_name\\\">Website Name</span>&nbsp;website.</p>\r\n<p>If you choose to use our Service, then you agree to the collection and use of information in relation with this policy. The Personal Information that we collect are used for providing and improving the Service. We will not use or share your information with anyone except as described in this Privacy Policy.</p>\r\n<p>The terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, which is accessible at&nbsp;<span class=\\\"highlight preview_website_url\\\">Website URL</span>, unless otherwise defined in this Privacy Policy.</p>\r\n<h4><strong>Information Collection and Use</strong></h4>\r\n<p>For a better experience while using our Service, we may require you to provide us with certain personally identifiable information, including but not limited to your name, phone number, and postal address. The information that we collect will be used to contact or identify you.</p>\r\n<h4><strong>Log Data</strong></h4>\r\n<p>We want to inform you that whenever you visit our Service, we collect information that your browser sends to us that is called Log Data. This Log Data may include information such as your computer\\\'s Internet Protocol (&ldquo;IP&rdquo;) address, browser version, pages of our Service that you visit, the time and date of your visit, the time spent on those pages, and other statistics.</p>\r\n<h4><strong>Cookies</strong></h4>\r\n<p>Cookies are files with small amount of data that is commonly used an anonymous unique identifier. These are sent to your browser from the website that you visit and are stored on your computer\\\'s hard drive.</p>\r\n<p>Our website uses these &ldquo;cookies&rdquo; to collection information and to improve our Service. You have the option to either accept or refuse these cookies, and know when a cookie is being sent to your computer. If you choose to refuse our cookies, you may not be able to use some portions of our Service.</p>\r\n<h4><strong>Service Providers</strong></h4>\r\n<p>We may employ third-party companies and individuals due to the following reasons:</p>\r\n<ul>\r\n<li>To facilitate our Service</li>\r\n<li>To provide the Service on our behalf</li>\r\n<li>To perform Service-related services or</li>\r\n<li>To assist us in analyzing how our Service is used.</li>\r\n</ul>\r\n<p>We want to inform our Service users that these third parties have access to your Personal Information. The reason is to perform the tasks assigned to them on our behalf. However, they are obligated not to disclose or use the information for any other purpose.</p>\r\n<h4><strong>Security</strong></h4>\r\n<p>We value your trust in providing us your Personal Information, thus we are striving to use commercially acceptable means of protecting it. But remember that no method of transmission over the internet, or method of electronic storage is 100% secure and reliable, and we cannot guarantee its absolute security.</p>\r\n<h4><strong>Links to Other Sites</strong></h4>\r\n<p>Our Service may contain links to other sites. If you click on a third-party link, you will be directed to that site. Note that these external sites are not operated by us. Therefore, we strongly advise you to review the Privacy Policy of these websites. We have no control over, and assume no responsibility for the content, privacy policies, or practices of any third-party sites or services.</p>\r\n<p>Children\\\'s Privacy</p>\r\n<p>Our Services do not address anyone under the age of 13. We do not knowingly collect personal identifiable information from children under 13. In the case we discover that a child under 13 has provided us with personal information, we immediately delete this from our servers. If you are a parent or guardian and you are aware that your child has provided us with personal information, please contact us so that we will be able to do necessary actions.</p>\r\n<h4><strong>Changes to This Privacy Policy</strong></h4>\r\n<p>We may update our Privacy Policy from time to time. Thus, we advise you to review this page periodically for any changes. We will notify you of any changes by posting the new Privacy Policy on this page. These changes are effective immediately, after they are posted on this page.</p>\r\n<h4><strong>Contact Us</strong></h4>\r\n<p>If you have any questions or suggestions about our Privacy Policy, do not hesitate to contact us.</p>', 3, 1),
(4, 'FAQ', 'faq', '<p>Coming Soon</p>', 4, 1),
(5, 'Contact Us', 'contact-us', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing.</p>', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateway`
--

CREATE TABLE `payment_gateway` (
  `id` int(11) NOT NULL,
  `gateway_name` varchar(255) NOT NULL,
  `gateway_info` text DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_gateway`
--

INSERT INTO `payment_gateway` (`id`, `gateway_name`, `gateway_info`, `status`) VALUES
(1, 'Paypal', '{\"mode\":\"sandbox\",\"paypal_client_id\":\"AcHrwP4VHD8x4EOB1UlIcof3bMB0oYYYjHfwO8STmh4JtncocJ3HK03lqy3YXYVGC3i6P-XdyqXQ-Aq2\",\"paypal_secret\":\"EJwVTBGDKymCNfoKi5PEmOyo-Ipdrl18K3RpetS1UB_hTyYNSZ92a3ysB8Sjo2Dpie7yfesGl3GB8VJW\",\"braintree_merchant_id\":null,\"braintree_public_key\":null,\"braintree_private_key\":null,\"braintree_merchant_account_id\":null}', 1),
(2, 'Stripe', '{\"stripe_secret_key\":\"sk_test_wfKUSBelSMhSeYOIGATJRYYc\",\"stripe_publishable_key\":\"pk_test_HrjNdMEV34CRkC8YHqxhDF9t\"}', 1),
(3, 'Razorpay', '{\"razorpay_key\":\"rzp_test_3Xn9o5IRWFjKR4\",\"razorpay_secret\":\"9GExgEs8mWk2j5b8KswuNzIx\"}', 1),
(4, 'Paystack', '{\"paystack_secret_key\":\"sk_test_b3a005e485d55c4dc47696c29f27705918f98a15\",\"paystack_public_key\":\"pk_test_03ee87c23e8815638f5c4ef582aca392e8b3c39b\"}', 1),
(5, 'Instamojo', '{\"mode\":\"sandbox\",\"instamojo_client_id\":\"test_PcXI4eNcSPDUhCFIPtlDQ4fDIrg5HEF59JF\",\"instamojo_client_secret\":\"test_GAiQQssOdpOr3crtW2ojvUjxcxMEGEOSn0MDb5kYmhev4pH1rXo9cUA9SiahNqoW1Rl7WWdVozV8PIiRHFL3S7tDX4celhONRs5WMB5UMT4r2SqqvOuDuACZF2G\"}', 1),
(6, 'PayUMoney', '{\"mode\":\"sandbox\",\"payu_merchant_id\":\"7395470\",\"payu_key\":\"oZ7oo9\",\"payu_salt\":\"UkojH5TS\"}', 1),
(7, 'Mollie', '{\"mollie_api_key\":\"test_xCx2M23braFkEQEq8MTTNMcqWsmcNH\"}', 1),
(8, 'Flutterwave', '{\"flutterwave_public_key\":\"FLWPUBK_TEST-f51cf17b8cba666f04f936cc353e7476-X\",\"flutterwave_secret_key\":\"FLWSECK_TEST-d5bde87b80505d041a40b5f11be1501f-X\",\"flutterwave_encryption_key\":\"FLWSECK_TESTc451dc94fee4\"}', 1),
(9, 'Paytm', '{\"mode\":\"live\",\"paytm_merchant_id\":\"klmUWi89177902422238\",\"paytm_merchant_key\":\"_LzjDNo#U9Hs9Lug\"}', 1),
(10, 'Cashfree', '{\"mode\":\"sandbox\",\"cashfree_appid\":\"26471574cfc7f83cc48613e90e517462\",\"cashfree_secret_key\":\"48413e91ee331dcad99e18129ad126dc627ed684\"}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payu_transactions`
--

CREATE TABLE `payu_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paid_for_id` bigint(20) UNSIGNED DEFAULT NULL,
  `paid_for_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gateway` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hash` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `response` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','failed','successful','invalid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `verified_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recently_watched`
--

CREATE TABLE `recently_watched` (
  `id` int(11) NOT NULL,
  `video_type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

CREATE TABLE `season` (
  `id` int(11) NOT NULL,
  `series_id` int(11) NOT NULL,
  `season_name` varchar(500) NOT NULL,
  `season_slug` varchar(255) NOT NULL,
  `season_poster` varchar(500) NOT NULL,
  `trailer_url` text DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(500) DEFAULT NULL,
  `seo_keyword` varchar(500) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `season`
--

INSERT INTO `season` (`id`, `series_id`, `season_name`, `season_slug`, `season_poster`, `trailer_url`, `seo_title`, `seo_description`, `seo_keyword`, `status`) VALUES
(1, 1, 'Season 1', 'season-1', 'upload/images/TheTerminalList-1.jpg', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', '', '', '', 1),
(2, 2, 'Season 1', 'season-1', 'upload/images/Tile_Boys.png', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', '', '', '', 1),
(3, 2, 'Season 2', 'season-2', 'upload/images/Tile_Boys.png', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', '', '', '', 1),
(4, 2, 'Season 3', 'season-3', 'upload/images/Tile_Boys.png', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', '', '', '', 1),
(5, 2, 'Season 4', 'season-4', 'upload/images/Tile_Boys.png', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', '', '', '', 1),
(6, 3, 'Season 1', 'season-1', 'upload/images/Aashram.jpg', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4', '', '', '', 1),
(7, 3, 'Season 2', 'season-2', 'upload/images/Aashram.jpg', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4', '', '', '', 1),
(8, 3, 'Season 3', 'season-3', 'upload/images/Aashram.jpg', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', '', '', '', 1),
(9, 4, 'Season 1', 'season-1', 'upload/images/stranger-things.jpg', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4', '', '', '', 1),
(10, 4, 'Season 2', 'season-2', 'upload/images/stranger-things.jpg', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', '', '', '', 1),
(11, 4, 'Season 3', 'season-3', 'upload/images/stranger-things.jpg', NULL, '', '', '', 1),
(12, 4, 'Season 4', 'season-4', 'upload/images/stranger-things.jpg', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', '', '', '', 1),
(15, 6, 'Season 1', 'season-1', 'upload/images/Young-Royals-Quotes-og.jpg', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', '', '', '', 1),
(16, 5, 'Season 1', 'season-1', 'upload/images/Blockbuster.jpg', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', '', '', '', 1),
(17, 7, 'Season 1', 'season-1', 'upload/images/ms-marvel-season-2.jpg', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', '', '', '', 1),
(18, 8, 'Season 1', 'season-1', 'upload/images/16421073016621.jpg', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', '', '', '', 1),
(19, 9, 'Season 1', 'season-1', 'upload/images/cobra-kai-5-cover-1.jpg', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', '', '', '', 1),
(20, 10, 'Season 1', 'season-1', 'upload/images/Obi-Wan-Kenobi.jpg', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', '', '', '', 1),
(21, 11, 'Season 1', 'season-1', 'upload/images/Guilty-Minds-Amazon-Prime.jpg', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', '', '', '', 1),
(22, 12, 'Season 1', 'season-1', 'upload/images/89886842.jpg', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', '', '', '', 1),
(23, 13, 'Season 1', 'season-1', 'upload/images/The_Great_Indian_Murder.jpg', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', '', '', '', 1),
(24, 14, 'Season 1', 'season-1', 'upload/images/66e79-16556360953931-1920.jpg', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', '', '', '', 1),
(25, 15, 'Season 1', 'season-1', 'upload/images/Black_Bird.jpg', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', '', '', '', 1),
(26, 16, 'Season 1', 'season-1', 'upload/images/Tierra_Incognita.jpg', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', '', '', '', 1),
(27, 17, 'Season 1', 'season-1', 'upload/images/p21449609_b_h9_aa.jpg', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', '', '', '', 1),
(28, 18, 'Season 1', 'season-1', 'upload/images/Rings-of-power.jpg', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', '', '', '', 1),
(29, 19, 'Season 1', 'season-1', 'upload/images/The-Family-Man.jpg', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', '', '', '', 1),
(30, 20, 'Season 1', 'season-1', 'upload/images/Criminal_Justice.jpg', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `series_lang_id` int(11) NOT NULL,
  `series_genres` text NOT NULL,
  `upcoming` int(1) NOT NULL DEFAULT 0,
  `series_access` varchar(255) NOT NULL DEFAULT 'Paid',
  `series_name` varchar(500) NOT NULL,
  `series_slug` varchar(255) NOT NULL,
  `series_info` text NOT NULL,
  `actor_id` text DEFAULT NULL,
  `director_id` text DEFAULT NULL,
  `series_poster` varchar(500) NOT NULL,
  `imdb_id` varchar(255) DEFAULT NULL,
  `imdb_rating` varchar(255) DEFAULT NULL,
  `imdb_votes` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(500) DEFAULT NULL,
  `seo_keyword` varchar(500) DEFAULT NULL,
  `content_rating` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`id`, `series_lang_id`, `series_genres`, `upcoming`, `series_access`, `series_name`, `series_slug`, `series_info`, `actor_id`, `director_id`, `series_poster`, `imdb_id`, `imdb_rating`, `imdb_votes`, `seo_title`, `seo_description`, `seo_keyword`, `content_rating`, `status`) VALUES
(1, 2, '2,1,5', 0, 'Paid', 'The Terminal List', 'the-terminal-list', 'A former Navy SEAL officer investigates why his entire platoon was ambushed during a high-stakes covert mission.', '64,65,66', NULL, 'upload/images/TheTerminalList-1.jpg', NULL, '8.2', NULL, '', '', '', '16+', 1),
(2, 2, '2,1', 0, 'Paid', 'The Boys', 'the-boys', 'A group of vigilantes set out to take down corrupt superheroes who abuse their superpowers.', '69,68,67', NULL, 'upload/images/Tile_Boys.jpg', NULL, '8.7', NULL, '', '', '', '13+', 1),
(3, 1, '1', 0, 'Free', 'Aashram', 'aashram', 'A duplicitous, aashram based, Indian Godman\\\'s good deeds serve activities criminal and unholy, such as rapes, murders, drugs, vote bank politics and forced male emasculation. The law and a few crusaders investigate to bring him to...', '72,70,71', NULL, 'upload/images/Aashram.jpg', NULL, '7.5', NULL, '', '', '', '16+', 1),
(4, 2, '1,11,6', 1, 'Free', 'Stranger Things', 'stranger-things', 'When a young boy disappears, his mother, a police chief and his friends must confront terrifying supernatural forces in order to get him back.', '74,73,75', NULL, 'upload/images/stranger-things-1.jpg', NULL, '8.7', NULL, '', '', '', NULL, 1),
(5, 2, '3', 1, 'Paid', 'Blockbuster', 'blockbuster', 'When a young boy disappears, his mother, a police chief and his friends must confront terrifying supernatural forces in order to get him back.', '68', '27', 'upload/images/Blockbuster.jpg', NULL, '8.9', NULL, '', '', '', NULL, 1),
(6, 2, '1', 1, 'Free', 'Young Royals', 'young-royals', 'When a young boy disappears, his mother, a police chief and his friends must confront terrifying supernatural forces in order to get him back.', '68', '16', 'upload/images/Young-Royals-Quotes-og.jpg', NULL, '9.2', NULL, '', '', '', NULL, 1),
(7, 2, '2,9,3', 1, 'Paid', 'Ms. Marvel', 'ms-marvel', 'Kamala is a superhero fan with an imagination, particularly when it comes to Captain Marvel; Kamala feels like she doesn\\\'t fit in at school and sometimes even at home, that is until she gets superpowers like the heroes she\\\'s looke...', '180,181,182', NULL, 'upload/images/ms-marvel-season-2.jpg', 'tt10857164', '6.2', '99,439', '', '', '', NULL, 1),
(8, 2, '2,9,3', 0, 'Free', 'Peacemaker', 'peacemaker', 'Picking up where The Suicide Squad (2021) left off, Peacemaker returns home after recovering from his encounter with Bloodsport - only to discover that his freedom comes at a price.', '184,185,183', NULL, 'upload/images/16421073016621.jpg', NULL, '8.3', NULL, '', '', '', NULL, 1),
(9, 2, '2,3,1', 0, 'Paid', 'Cobra Kai', 'cobra-kai', 'Decades after their 1984 All Valley Karate Tournament bout, a middle-aged Daniel LaRusso and Johnny Lawrence find themselves martial-arts rivals again.', '186,187,188', NULL, 'upload/images/cobra-kai-5-cover-1.jpg', 'tt7221388', '8.5', '182,421', '', '', '', NULL, 1),
(10, 2, '2,9,10', 0, 'Free', 'Obi Wan Kenobi', 'obi-wan-kenobi', 'Jedi Master Obi-Wan Kenobi has to save young Leia after she is kidnapped, all the while being pursued by Imperial Inquisitors and his former Padawan, now known as Darth Vader.', '192,193,194', NULL, 'upload/images/Obi-Wan-Kenobi.jpg', NULL, '7.1', NULL, '', '', '', NULL, 1),
(11, 1, '1', 0, 'Paid', 'Guilty Minds', 'guilty-minds', 'Guilty Minds is a legal drama about one family that is the paragon of virtue and the other, a leading law firm dealing with all shades of grey.', '197,195,196', NULL, 'upload/images/Guilty-Minds-Amazon-Prime.jpg', NULL, '7.4', NULL, '', '', '', NULL, 1),
(12, 1, '1', 0, 'Free', 'Rudra: The Edge of Darkness', 'rudra-the-edge-of-darkness', 'In the crime-ridden streets of Mumbai, journeying through the maze of psychopathic minds is brilliant super-cop Rudra Veer Singh.', '198,200,199', NULL, 'upload/images/89886842.jpg', NULL, '6.7', NULL, '', '', '', NULL, 1),
(13, 1, '2', 0, 'Free', 'The Great Indian Murder', 'the-great-indian-murder', 'When notorious industrialist Vicky Rai gets killed at a party, the main suspects are the guests - both invited and uninvited.', '203,201,202', NULL, 'upload/images/The_Great_Indian_Murder.jpg', NULL, '7.1', NULL, '', '', '', NULL, 1),
(14, 2, '1,11,8', 0, 'Paid', 'The Time Traveler\\\'s Wife', 'the-time-travelers-wife', 'Tells the intricate love story of Clare and Henry, and a marriage with a problem... time travel.', '204,205,206', NULL, 'upload/images/66e79-16556360953931-1920.jpg', 'tt8783930', '7.7', '13,789', '', '', '', NULL, 1),
(15, 2, '1', 0, 'Free', 'Black Bird', 'black-bird', 'Jimmy Keene is sentenced to 10 years in a minimum security prison but he cuts a deal with the FBI to befriend a suspected serial killer. Keene has to elicit a confession from Larry Hall to find the bodies of as many as eighteen wo...', '209,208,207', NULL, 'upload/images/Black_Bird.jpg', NULL, '8.2', NULL, '', '', '', NULL, 1),
(16, 3, '6', 0, 'Paid', 'Tierra Incógnita', 'tierra-incognita', 'After his parents mysteriously disappeared eight years ago, young Eric Dalaras embarks on a search for the truth and enters a frightening world. He and his sister Uma grew up with their maternal grandparents. Eric decides to leave...', '211,210,212', NULL, 'upload/images/Tierra_Incognita.jpg', NULL, '5.1', NULL, '', '', '', NULL, 1),
(17, 2, '2,9,10', 0, 'Paid', 'Star Trek: Strange New Worlds', 'star-trek-strange-new-worlds', 'A prequel to Star Trek: The Original Series, the show will follow the crew of the USS Enterprise under Captain Christopher Pike.', '213,214,215', NULL, 'upload/images/p21449609_b_h9_aa.jpg', 'tt12327578', '8.2', '27,853', '', '', '', NULL, 1),
(18, 2, '2,9,1', 0, 'Free', 'The Lord of the Rings: The Rings of Power', 'the-lord-of-the-rings-the-rings-of-power', 'Epic drama set thousands of years before the events of J.R.R. Tolkien\\\'s \\\'The Hobbit\\\' and \\\'The Lord of the Rings\\\' follows an ensemble cast of characters, both familiar and new, as they confront the long-feared re-emergence of evil ...', '217,216,21', NULL, 'upload/images/Rings-of-power.jpg', NULL, '6.9', NULL, '', '', '', NULL, 1),
(19, 2, '3,1,11', 0, 'Paid', 'The Family Man', 'the-family-man', 'A fast-lane investment broker, offered the opportunity to see how the other half lives, wakes up to find that his sports car and girlfriend have become a mini-van and wife.', '221,219,220', '218', 'upload/images/The-Family-Man.jpg', NULL, '6.8', NULL, '', '', '', NULL, 1),
(20, 1, '1', 0, 'Free', 'Criminal Justice: Behind Closed Doors', 'criminal-justice-behind-closed-doors', 'Anuradha Chandra stabs her perfect lawyer husband one fateful night and confesses to her crime. However, it is anything but an open and shut case.', '178,223,222', NULL, 'upload/images/Criminal_Justice.jpg', NULL, '7.4', NULL, '', '', '', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `time_zone` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'UTC',
  `default_language` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en',
  `styling` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'light',
  `site_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_favicon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_keywords` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_header_code` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_footer_code` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_copyright` text COLLATE utf8_unicode_ci NOT NULL,
  `currency_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `footer_fb_link` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer_twitter_link` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer_instagram_link` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer_google_play_link` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer_apple_store_link` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `smtp_host` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `smtp_port` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `smtp_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `smtp_password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `smtp_encryption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gdpr_cookie_title` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gdpr_cookie_text` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `gdpr_cookie_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `omdb_api_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `external_css_js` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'local',
  `google_login` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `facebook_login` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `google_client_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_client_secret` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_redirect` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_app_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_client_secret` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_redirect` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `maintenance mode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `envato_buyer_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `envato_purchase_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_shows` int(1) NOT NULL DEFAULT 1,
  `menu_movies` int(1) NOT NULL DEFAULT 1,
  `menu_sports` int(1) NOT NULL DEFAULT 1,
  `menu_livetv` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `time_zone`, `default_language`, `styling`, `site_name`, `site_email`, `site_logo`, `site_favicon`, `site_description`, `site_keywords`, `site_header_code`, `site_footer_code`, `site_copyright`, `currency_code`, `footer_fb_link`, `footer_twitter_link`, `footer_instagram_link`, `footer_google_play_link`, `footer_apple_store_link`, `smtp_host`, `smtp_port`, `smtp_email`, `smtp_password`, `smtp_encryption`, `gdpr_cookie_title`, `gdpr_cookie_text`, `gdpr_cookie_url`, `omdb_api_key`, `external_css_js`, `google_login`, `facebook_login`, `google_client_id`, `google_client_secret`, `google_redirect`, `facebook_app_id`, `facebook_client_secret`, `facebook_redirect`, `maintenance mode`, `envato_buyer_name`, `envato_purchase_code`, `menu_shows`, `menu_movies`, `menu_sports`, `menu_livetv`) VALUES
(1, 'Asia/Kolkata', 'en', 'style-six', 'Viavi Streaming - Watch TV Shows, Movies Online', 'info@viavilab.com', 'upload/images/logo.png', 'upload/images/favicon.png', 'Viavi Streaming is Best Script for Streaming Website & Application | Streaming App | Streaming Script | TV Streaming Source Code | TV Clone | Netflix Clone | Amazon Prime Clone | Hotstar Clone | Streaming App', 'Video Streaming, Streaming Website, Streaming App, Live TV, Movies, TV Shows', '', '', 'Copyright © 2022 www.viaviweb.com All Rights Reserved.', 'USD', 'https://www.facebook.com/viaviweb/', 'https://twitter.com/viaviwebtech/', 'https://www.instagram.com/viaviwebtech/', 'https://play.google.com/store/apps/dev?id=7157478532572017100', 'https://apps.apple.com/in/developer/vishal-pamar/id1141291247', '', '', '', '', 'SSL', 'This website is using cookies', 'We use them to give you the best experience. If you continue using our website, we\\\'ll assume that you are happy to receive all cookies on this website.', '#', '815fcbbc', 'LOCAL', '1', '0', '162842286728-p66caoetttj32qk95lea3hl2jqqcoqeu.apps.googleusercontent.com', '2Gt8VQysr4NJw2erg28oJt7C', 'http://localhost/video_streaming_new/auth/google/callback', NULL, NULL, 'http://localhost/video_streaming_new/auth/facebook/callback', '', '', '', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings_android_app`
--

CREATE TABLE `settings_android_app` (
  `id` int(11) NOT NULL,
  `app_name` varchar(255) NOT NULL,
  `app_logo` varchar(255) DEFAULT NULL,
  `app_version` varchar(255) DEFAULT NULL,
  `app_company` varchar(255) DEFAULT NULL,
  `app_email` varchar(255) DEFAULT NULL,
  `app_website` varchar(255) DEFAULT NULL,
  `app_contact` varchar(255) DEFAULT NULL,
  `app_about` text DEFAULT NULL,
  `app_privacy` text DEFAULT NULL,
  `app_terms` text DEFAULT NULL,
  `onesignal_app_id` varchar(255) DEFAULT NULL,
  `onesignal_rest_key` varchar(255) DEFAULT NULL,
  `app_update_hide_show` varchar(255) DEFAULT NULL,
  `app_update_version_code` varchar(255) DEFAULT NULL,
  `app_update_desc` text DEFAULT NULL,
  `app_update_link` varchar(255) DEFAULT NULL,
  `app_update_cancel_option` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings_android_app`
--

INSERT INTO `settings_android_app` (`id`, `app_name`, `app_logo`, `app_version`, `app_company`, `app_email`, `app_website`, `app_contact`, `app_about`, `app_privacy`, `app_terms`, `onesignal_app_id`, `onesignal_rest_key`, `app_update_hide_show`, `app_update_version_code`, `app_update_desc`, `app_update_link`, `app_update_cancel_option`) VALUES
(1, 'Video Streaming App', 'upload/images/logo.png', '1.0.0', 'Viavi Webtech', 'info@viaviweb.com', 'www.viaviweb.com', '+91 9227777522', '<p>Watch your favorite TV channels Live in your mobile phone with this application on your device. that support almost all format.The application is specially optimized to be extremely easy to configure and detailed documentation is provided.</p>\r\n<p><textarea id=\\\"BFI_DATA\\\" style=\\\"width: 1px; height: 1px; display: none;\\\"></textarea></p>\r\n<div id=\\\"WidgetFloaterPanels\\\" class=\\\"LTRStyle\\\" style=\\\"display: none; text-align: left; direction: ltr; visibility: hidden;\\\" translate=\\\"no\\\">\r\n<div id=\\\"WidgetFloater\\\" style=\\\"display: none;\\\">\r\n<div id=\\\"WidgetLogoPanel\\\"><span id=\\\"WidgetTranslateWithSpan\\\">TRANSLATE with <img id=\\\"FloaterLogo\\\" alt=\\\"\\\" /></span> <span id=\\\"WidgetCloseButton\\\" title=\\\"Exit Translation\\\">x</span></div>\r\n<div id=\\\"LanguageMenuPanel\\\">\r\n<div class=\\\"DDStyle_outer\\\"><input id=\\\"LanguageMenu_svid\\\" style=\\\"display: none;\\\" autocomplete=\\\"on\\\" name=\\\"LanguageMenu_svid\\\" type=\\\"text\\\" value=\\\"en\\\" /> <input id=\\\"LanguageMenu_textid\\\" style=\\\"display: none;\\\" autocomplete=\\\"on\\\" name=\\\"LanguageMenu_textid\\\" type=\\\"text\\\" /> <span id=\\\"__LanguageMenu_header\\\" class=\\\"DDStyle\\\" tabindex=\\\"0\\\">English</span>\r\n<div style=\\\"position: relative; text-align: left; left: 0;\\\">\r\n<div style=\\\"position: absolute; ;left: 0px;\\\">\r\n<div id=\\\"__LanguageMenu_popup\\\" class=\\\"DDStyle\\\" style=\\\"display: none;\\\">\r\n<table id=\\\"LanguageMenu\\\" border=\\\"0\\\">\r\n<tbody>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#ar\\\">Arabic</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#he\\\">Hebrew</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#pl\\\">Polish</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#bg\\\">Bulgarian</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#hi\\\">Hindi</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#pt\\\">Portuguese</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#ca\\\">Catalan</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#mww\\\">Hmong Daw</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#ro\\\">Romanian</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#zh-CHS\\\">Chinese Simplified</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#hu\\\">Hungarian</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#ru\\\">Russian</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#zh-CHT\\\">Chinese Traditional</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#id\\\">Indonesian</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#sk\\\">Slovak</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#cs\\\">Czech</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#it\\\">Italian</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#sl\\\">Slovenian</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#da\\\">Danish</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#ja\\\">Japanese</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#es\\\">Spanish</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#nl\\\">Dutch</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#tlh\\\">Klingon</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#sv\\\">Swedish</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#en\\\">English</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#ko\\\">Korean</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#th\\\">Thai</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#et\\\">Estonian</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#lv\\\">Latvian</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#tr\\\">Turkish</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#fi\\\">Finnish</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#lt\\\">Lithuanian</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#uk\\\">Ukrainian</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#fr\\\">French</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#ms\\\">Malay</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#ur\\\">Urdu</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#de\\\">German</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#mt\\\">Maltese</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#vi\\\">Vietnamese</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#el\\\">Greek</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#no\\\">Norwegian</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#cy\\\">Welsh</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#ht\\\">Haitian Creole</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#fa\\\">Persian</a></td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<img style=\\\"height: 7px; width: 17px; border-width: 0px; left: 20px;\\\" alt=\\\"\\\" /></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div id=\\\"CTFLinksPanel\\\"><span id=\\\"ExternalLinksPanel\\\"><a id=\\\"HelpLink\\\" title=\\\"Help\\\" href=\\\"https://go.microsoft.com/?linkid=9722454\\\" target=\\\"_blank\\\" rel=\\\"noopener\\\"> <img id=\\\"HelpImg\\\" alt=\\\"\\\" /></a> <a id=\\\"EmbedLink\\\" title=\\\"Get this widget for your own site\\\"></a> <img id=\\\"EmbedImg\\\" alt=\\\"\\\" /> <a id=\\\"ShareLink\\\" title=\\\"Share translated page with friends\\\"></a> <img id=\\\"ShareImg\\\" alt=\\\"\\\" /> </span></div>\r\n<div id=\\\"FloaterProgressBar\\\"></div>\r\n</div>\r\n<div id=\\\"WidgetFloaterCollapsed\\\" style=\\\"display: none;\\\">TRANSLATE with <img id=\\\"CollapsedLogoImg\\\" alt=\\\"\\\" /></div>\r\n<div id=\\\"FloaterSharePanel\\\" style=\\\"display: none;\\\">\r\n<div id=\\\"ShareTextDiv\\\"><span id=\\\"ShareTextSpan\\\"> COPY THE URL BELOW </span></div>\r\n<div id=\\\"ShareTextboxDiv\\\"><input id=\\\"ShareTextbox\\\" name=\\\"ShareTextbox\\\" readonly=\\\"readonly\\\" type=\\\"text\\\" /> <!--a id=\\\"TwitterLink\\\" title=\\\"Share on Twitter\\\"> <img id=\\\"TwitterImg\\\" /></a> <a-- id=\\\"FacebookLink\\\" title=\\\"Share on Facebook\\\"> <img id=\\\"FacebookImg\\\" /></a--> <a id=\\\"EmailLink\\\" title=\\\"Email this translation\\\"></a> <img id=\\\"EmailImg\\\" alt=\\\"\\\" /></div>\r\n<div id=\\\"ShareFooter\\\"><span id=\\\"ShareHelpSpan\\\"><a id=\\\"ShareHelpLink\\\"></a> <img id=\\\"ShareHelpImg\\\" alt=\\\"\\\" /></span> <span id=\\\"ShareBackSpan\\\"><a id=\\\"ShareBack\\\" title=\\\"Back To Translation\\\"></a> Back</span></div>\r\n<input id=\\\"EmailSubject\\\" name=\\\"EmailSubject\\\" type=\\\"hidden\\\" value=\\\"Check out this page in {0} translated from {1}\\\" /> <input id=\\\"EmailBody\\\" name=\\\"EmailBody\\\" type=\\\"hidden\\\" value=\\\"Translated: {0}%0d%0aOriginal: {1}%0d%0a%0d%0aAutomatic translation powered by Microsoft&reg; Translator%0d%0ahttp://www.bing.com/translator?ref=MSTWidget\\\" /> <input id=\\\"ShareHelpText\\\" type=\\\"hidden\\\" value=\\\"This link allows visitors to launch this page and automatically translate it to {0}.\\\" /></div>\r\n<div id=\\\"FloaterEmbed\\\" style=\\\"display: none;\\\">\r\n<div id=\\\"EmbedTextDiv\\\"><span id=\\\"EmbedTextSpan\\\">EMBED THE SNIPPET BELOW IN YOUR SITE</span> <a id=\\\"EmbedHelpLink\\\" title=\\\"Copy this code and place it into your HTML.\\\"></a> <img id=\\\"EmbedHelpImg\\\" alt=\\\"\\\" /></div>\r\n<div id=\\\"EmbedTextboxDiv\\\"><input id=\\\"EmbedSnippetTextBox\\\" name=\\\"EmbedSnippetTextBox\\\" readonly=\\\"readonly\\\" type=\\\"text\\\" value=\\\"&lt;div id=\\\'MicrosoftTranslatorWidget\\\' class=\\\'Dark\\\' style=\\\'color:white;background-color:#555555\\\'&gt;&lt;/div&gt;&lt;script type=\\\'text/javascript\\\'&gt;setTimeout(function(){var s=document.createElement(\\\'script\\\');s.type=\\\'text/javascript\\\';s.charset=\\\'UTF-8\\\';s.src=((location &amp;&amp; location.href &amp;&amp; location.href.indexOf(\\\'https\\\') == 0)?\\\'https://ssl.microsofttranslator.com\\\':\\\'http://www.microsofttranslator.com\\\')+\\\'/ajax/v3/WidgetV3.ashx?siteData=ueOIGRSKkd965FeEGM5JtQ**&amp;ctf=true&amp;ui=true&amp;settings=manual&amp;from=en\\\';var p=document.getElementsByTagName(\\\'head\\\')[0]||document.documentElement;p.insertBefore(s,p.firstChild); },0);&lt;/script&gt;\\\" /></div>\r\n<div id=\\\"EmbedNoticeDiv\\\"><span id=\\\"EmbedNoticeSpan\\\">Enable collaborative features and customize widget: <a href=\\\"http://www.bing.com/widget/translator\\\" target=\\\"_blank\\\" rel=\\\"noopener\\\">Bing Webmaster Portal</a></span></div>\r\n<div id=\\\"EmbedFooterDiv\\\"><span id=\\\"EmbedBackSpan\\\"><a title=\\\"Back To Translation\\\">Back</a></span></div>\r\n</div>\r\n</div>', '<p><strong>We are committed to protecting your privacy</strong></p>\r\n<p>We collect the minimum amount of information about you that is commensurate with providing you with a satisfactory service. This policy indicates the type of processes that may result in data being collected about you. Your use of this website gives us the right to collect that information.&nbsp;</p>\r\n<p><strong>Information Collected</strong></p>\r\n<p>We may collect any or all of the information that you give us depending on the type of transaction you enter into, including your name, address, telephone number, and email address, together with data about your use of the website. Other information that may be needed from time to time to process a request may also be collected as indicated on the website.</p>\r\n<p><strong>Information Use</strong></p>\r\n<p>We use the information collected primarily to process the task for which you visited the website. Data collected in the UK is held in accordance with the Data Protection Act. All reasonable precautions are taken to prevent unauthorised access to this information. This safeguard may require you to provide additional forms of identity should you wish to obtain information about your account details.</p>\r\n<p><strong>Cookies</strong></p>\r\n<p>Your Internet browser has the in-built facility for storing small files - \\\"cookies\\\" - that hold information which allows a website to recognise your account. Our website takes advantage of this facility to enhance your experience. You have the ability to prevent your computer from accepting cookies but, if you do, certain functionality on the website may be impaired.</p>\r\n<p><strong>Disclosing Information</strong></p>\r\n<p>We do not disclose any personal information obtained about you from this website to third parties unless you permit us to do so by ticking the relevant boxes in registration or competition forms. We may also use the information to keep in contact with you and inform you of developments associated with us. You will be given the opportunity to remove yourself from any mailing list or similar device. If at any time in the future we should wish to disclose information collected on this website to any third party, it would only be with your knowledge and consent.&nbsp;</p>\r\n<p>We may from time to time provide information of a general nature to third parties - for example, the number of individuals visiting our website or completing a registration form, but we will not use any information that could identify those individuals.&nbsp;</p>\r\n<p>In addition Dummy may work with third parties for the purpose of delivering targeted behavioural advertising to the Dummy website. Through the use of cookies, anonymous information about your use of our websites and other websites will be used to provide more relevant adverts about goods and services of interest to you. For more information on online behavioural advertising and about how to turn this feature off, please visit youronlinechoices.com/opt-out.</p>\r\n<p><strong>Changes to this Policy</strong></p>\r\n<p>Any changes to our Privacy Policy will be placed here and will supersede this version of our policy. We will take reasonable steps to draw your attention to any changes in our policy. However, to be on the safe side, we suggest that you read this document each time you use the website to ensure that it still meets with your approval.</p>\r\n<p><strong>Contacting Us</strong></p>\r\n<p>If you have any questions about our Privacy Policy, or if you want to know what information we have collected about you, please email us at hd@dummy.com. You can also correct any factual errors in that information or require us to remove your details form any list under our control.</p>\r\n<p><textarea id=\\\"BFI_DATA\\\" style=\\\"width: 1px; height: 1px; display: none;\\\"></textarea></p>\r\n<div id=\\\"WidgetFloaterPanels\\\" class=\\\"LTRStyle\\\" style=\\\"display: none; text-align: left; direction: ltr; visibility: hidden;\\\" translate=\\\"no\\\">\r\n<div id=\\\"WidgetFloater\\\" style=\\\"display: none;\\\">\r\n<div id=\\\"WidgetLogoPanel\\\"><span id=\\\"WidgetTranslateWithSpan\\\">TRANSLATE with <img id=\\\"FloaterLogo\\\" alt=\\\"\\\" /></span> <span id=\\\"WidgetCloseButton\\\" title=\\\"Exit Translation\\\">x</span></div>\r\n<div id=\\\"LanguageMenuPanel\\\">\r\n<div class=\\\"DDStyle_outer\\\"><input id=\\\"LanguageMenu_svid\\\" style=\\\"display: none;\\\" autocomplete=\\\"on\\\" name=\\\"LanguageMenu_svid\\\" type=\\\"text\\\" value=\\\"en\\\" /> <input id=\\\"LanguageMenu_textid\\\" style=\\\"display: none;\\\" autocomplete=\\\"on\\\" name=\\\"LanguageMenu_textid\\\" type=\\\"text\\\" /> <span id=\\\"__LanguageMenu_header\\\" class=\\\"DDStyle\\\" tabindex=\\\"0\\\">English</span>\r\n<div style=\\\"position: relative; text-align: left; left: 0;\\\">\r\n<div style=\\\"position: absolute; ;left: 0px;\\\">\r\n<div id=\\\"__LanguageMenu_popup\\\" class=\\\"DDStyle\\\" style=\\\"display: none;\\\">\r\n<table id=\\\"LanguageMenu\\\" border=\\\"0\\\">\r\n<tbody>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#ar\\\">Arabic</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#he\\\">Hebrew</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#pl\\\">Polish</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#bg\\\">Bulgarian</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#hi\\\">Hindi</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#pt\\\">Portuguese</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#ca\\\">Catalan</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#mww\\\">Hmong Daw</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#ro\\\">Romanian</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#zh-CHS\\\">Chinese Simplified</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#hu\\\">Hungarian</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#ru\\\">Russian</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#zh-CHT\\\">Chinese Traditional</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#id\\\">Indonesian</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#sk\\\">Slovak</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#cs\\\">Czech</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#it\\\">Italian</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#sl\\\">Slovenian</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#da\\\">Danish</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#ja\\\">Japanese</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#es\\\">Spanish</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#nl\\\">Dutch</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#tlh\\\">Klingon</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#sv\\\">Swedish</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#en\\\">English</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#ko\\\">Korean</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#th\\\">Thai</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#et\\\">Estonian</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#lv\\\">Latvian</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#tr\\\">Turkish</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#fi\\\">Finnish</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#lt\\\">Lithuanian</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#uk\\\">Ukrainian</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#fr\\\">French</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#ms\\\">Malay</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#ur\\\">Urdu</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#de\\\">German</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#mt\\\">Maltese</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#vi\\\">Vietnamese</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#el\\\">Greek</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#no\\\">Norwegian</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#cy\\\">Welsh</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#ht\\\">Haitian Creole</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#fa\\\">Persian</a></td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<img style=\\\"height: 7px; width: 17px; border-width: 0px; left: 20px;\\\" alt=\\\"\\\" /></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div id=\\\"CTFLinksPanel\\\"><span id=\\\"ExternalLinksPanel\\\"><a id=\\\"HelpLink\\\" title=\\\"Help\\\" href=\\\"https://go.microsoft.com/?linkid=9722454\\\" target=\\\"_blank\\\" rel=\\\"noopener\\\"> <img id=\\\"HelpImg\\\" alt=\\\"\\\" /></a> <a id=\\\"EmbedLink\\\" title=\\\"Get this widget for your own site\\\"></a> <img id=\\\"EmbedImg\\\" alt=\\\"\\\" /> <a id=\\\"ShareLink\\\" title=\\\"Share translated page with friends\\\"></a> <img id=\\\"ShareImg\\\" alt=\\\"\\\" /> </span></div>\r\n<div id=\\\"FloaterProgressBar\\\"></div>\r\n</div>\r\n<div id=\\\"WidgetFloaterCollapsed\\\" style=\\\"display: none;\\\">TRANSLATE with <img id=\\\"CollapsedLogoImg\\\" alt=\\\"\\\" /></div>\r\n<div id=\\\"FloaterSharePanel\\\" style=\\\"display: none;\\\">\r\n<div id=\\\"ShareTextDiv\\\"><span id=\\\"ShareTextSpan\\\"> COPY THE URL BELOW </span></div>\r\n<div id=\\\"ShareTextboxDiv\\\"><input id=\\\"ShareTextbox\\\" name=\\\"ShareTextbox\\\" readonly=\\\"readonly\\\" type=\\\"text\\\" /> <!--a id=\\\"TwitterLink\\\" title=\\\"Share on Twitter\\\"> <img id=\\\"TwitterImg\\\" /></a> <a-- id=\\\"FacebookLink\\\" title=\\\"Share on Facebook\\\"> <img id=\\\"FacebookImg\\\" /></a--> <a id=\\\"EmailLink\\\" title=\\\"Email this translation\\\"></a> <img id=\\\"EmailImg\\\" alt=\\\"\\\" /></div>\r\n<div id=\\\"ShareFooter\\\"><span id=\\\"ShareHelpSpan\\\"><a id=\\\"ShareHelpLink\\\"></a> <img id=\\\"ShareHelpImg\\\" alt=\\\"\\\" /></span> <span id=\\\"ShareBackSpan\\\"><a id=\\\"ShareBack\\\" title=\\\"Back To Translation\\\"></a> Back</span></div>\r\n<input id=\\\"EmailSubject\\\" name=\\\"EmailSubject\\\" type=\\\"hidden\\\" value=\\\"Check out this page in {0} translated from {1}\\\" /> <input id=\\\"EmailBody\\\" name=\\\"EmailBody\\\" type=\\\"hidden\\\" value=\\\"Translated: {0}%0d%0aOriginal: {1}%0d%0a%0d%0aAutomatic translation powered by Microsoft&reg; Translator%0d%0ahttp://www.bing.com/translator?ref=MSTWidget\\\" /> <input id=\\\"ShareHelpText\\\" type=\\\"hidden\\\" value=\\\"This link allows visitors to launch this page and automatically translate it to {0}.\\\" /></div>\r\n<div id=\\\"FloaterEmbed\\\" style=\\\"display: none;\\\">\r\n<div id=\\\"EmbedTextDiv\\\"><span id=\\\"EmbedTextSpan\\\">EMBED THE SNIPPET BELOW IN YOUR SITE</span> <a id=\\\"EmbedHelpLink\\\" title=\\\"Copy this code and place it into your HTML.\\\"></a> <img id=\\\"EmbedHelpImg\\\" alt=\\\"\\\" /></div>\r\n<div id=\\\"EmbedTextboxDiv\\\"><input id=\\\"EmbedSnippetTextBox\\\" name=\\\"EmbedSnippetTextBox\\\" readonly=\\\"readonly\\\" type=\\\"text\\\" value=\\\"&lt;div id=\\\'MicrosoftTranslatorWidget\\\' class=\\\'Dark\\\' style=\\\'color:white;background-color:#555555\\\'&gt;&lt;/div&gt;&lt;script type=\\\'text/javascript\\\'&gt;setTimeout(function(){var s=document.createElement(\\\'script\\\');s.type=\\\'text/javascript\\\';s.charset=\\\'UTF-8\\\';s.src=((location &amp;&amp; location.href &amp;&amp; location.href.indexOf(\\\'https\\\') == 0)?\\\'https://ssl.microsofttranslator.com\\\':\\\'http://www.microsofttranslator.com\\\')+\\\'/ajax/v3/WidgetV3.ashx?siteData=ueOIGRSKkd965FeEGM5JtQ**&amp;ctf=true&amp;ui=true&amp;settings=manual&amp;from=en\\\';var p=document.getElementsByTagName(\\\'head\\\')[0]||document.documentElement;p.insertBefore(s,p.firstChild); },0);&lt;/script&gt;\\\" /></div>\r\n<div id=\\\"EmbedNoticeDiv\\\"><span id=\\\"EmbedNoticeSpan\\\">Enable collaborative features and customize widget: <a href=\\\"http://www.bing.com/widget/translator\\\" target=\\\"_blank\\\" rel=\\\"noopener\\\">Bing Webmaster Portal</a></span></div>\r\n<div id=\\\"EmbedFooterDiv\\\"><span id=\\\"EmbedBackSpan\\\"><a title=\\\"Back To Translation\\\">Back</a></span></div>\r\n</div>\r\n</div>', '<p>terms</p>\r\n<p><textarea id=\\\"BFI_DATA\\\" style=\\\"width: 1px; height: 1px; display: none;\\\"></textarea></p>\r\n<div id=\\\"WidgetFloaterPanels\\\" class=\\\"LTRStyle\\\" style=\\\"display: none; text-align: left; direction: ltr; visibility: hidden;\\\" translate=\\\"no\\\">\r\n<div id=\\\"WidgetFloater\\\" style=\\\"display: none;\\\">\r\n<div id=\\\"WidgetLogoPanel\\\"><span id=\\\"WidgetTranslateWithSpan\\\">TRANSLATE with <img id=\\\"FloaterLogo\\\" alt=\\\"\\\" /></span> <span id=\\\"WidgetCloseButton\\\" title=\\\"Exit Translation\\\">x</span></div>\r\n<div id=\\\"LanguageMenuPanel\\\">\r\n<div class=\\\"DDStyle_outer\\\"><input id=\\\"LanguageMenu_svid\\\" style=\\\"display: none;\\\" autocomplete=\\\"on\\\" name=\\\"LanguageMenu_svid\\\" type=\\\"text\\\" value=\\\"en\\\" /> <input id=\\\"LanguageMenu_textid\\\" style=\\\"display: none;\\\" autocomplete=\\\"on\\\" name=\\\"LanguageMenu_textid\\\" type=\\\"text\\\" /> <span id=\\\"__LanguageMenu_header\\\" class=\\\"DDStyle\\\" tabindex=\\\"0\\\">English</span>\r\n<div style=\\\"position: relative; text-align: left; left: 0;\\\">\r\n<div style=\\\"position: absolute; ;left: 0px;\\\">\r\n<div id=\\\"__LanguageMenu_popup\\\" class=\\\"DDStyle\\\" style=\\\"display: none;\\\">\r\n<table id=\\\"LanguageMenu\\\" border=\\\"0\\\">\r\n<tbody>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#ar\\\">Arabic</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#he\\\">Hebrew</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#pl\\\">Polish</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#bg\\\">Bulgarian</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#hi\\\">Hindi</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#pt\\\">Portuguese</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#ca\\\">Catalan</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#mww\\\">Hmong Daw</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#ro\\\">Romanian</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#zh-CHS\\\">Chinese Simplified</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#hu\\\">Hungarian</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#ru\\\">Russian</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#zh-CHT\\\">Chinese Traditional</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#id\\\">Indonesian</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#sk\\\">Slovak</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#cs\\\">Czech</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#it\\\">Italian</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#sl\\\">Slovenian</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#da\\\">Danish</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#ja\\\">Japanese</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#es\\\">Spanish</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#nl\\\">Dutch</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#tlh\\\">Klingon</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#sv\\\">Swedish</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#en\\\">English</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#ko\\\">Korean</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#th\\\">Thai</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#et\\\">Estonian</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#lv\\\">Latvian</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#tr\\\">Turkish</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#fi\\\">Finnish</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#lt\\\">Lithuanian</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#uk\\\">Ukrainian</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#fr\\\">French</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#ms\\\">Malay</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#ur\\\">Urdu</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#de\\\">German</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#mt\\\">Maltese</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#vi\\\">Vietnamese</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#el\\\">Greek</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#no\\\">Norwegian</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#cy\\\">Welsh</a></td>\r\n</tr>\r\n<tr>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#ht\\\">Haitian Creole</a></td>\r\n<td><a tabindex=\\\"-1\\\" href=\\\"#fa\\\">Persian</a></td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<img style=\\\"height: 7px; width: 17px; border-width: 0px; left: 20px;\\\" alt=\\\"\\\" /></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div id=\\\"CTFLinksPanel\\\"><span id=\\\"ExternalLinksPanel\\\"><a id=\\\"HelpLink\\\" title=\\\"Help\\\" href=\\\"https://go.microsoft.com/?linkid=9722454\\\" target=\\\"_blank\\\" rel=\\\"noopener\\\"> <img id=\\\"HelpImg\\\" alt=\\\"\\\" /></a> <a id=\\\"EmbedLink\\\" title=\\\"Get this widget for your own site\\\"></a> <img id=\\\"EmbedImg\\\" alt=\\\"\\\" /> <a id=\\\"ShareLink\\\" title=\\\"Share translated page with friends\\\"></a> <img id=\\\"ShareImg\\\" alt=\\\"\\\" /> </span></div>\r\n<div id=\\\"FloaterProgressBar\\\"></div>\r\n</div>\r\n<div id=\\\"WidgetFloaterCollapsed\\\" style=\\\"display: none;\\\">TRANSLATE with <img id=\\\"CollapsedLogoImg\\\" alt=\\\"\\\" /></div>\r\n<div id=\\\"FloaterSharePanel\\\" style=\\\"display: none;\\\">\r\n<div id=\\\"ShareTextDiv\\\"><span id=\\\"ShareTextSpan\\\"> COPY THE URL BELOW </span></div>\r\n<div id=\\\"ShareTextboxDiv\\\"><input id=\\\"ShareTextbox\\\" name=\\\"ShareTextbox\\\" readonly=\\\"readonly\\\" type=\\\"text\\\" /> <!--a id=\\\"TwitterLink\\\" title=\\\"Share on Twitter\\\"> <img id=\\\"TwitterImg\\\" /></a> <a-- id=\\\"FacebookLink\\\" title=\\\"Share on Facebook\\\"> <img id=\\\"FacebookImg\\\" /></a--> <a id=\\\"EmailLink\\\" title=\\\"Email this translation\\\"></a> <img id=\\\"EmailImg\\\" alt=\\\"\\\" /></div>\r\n<div id=\\\"ShareFooter\\\"><span id=\\\"ShareHelpSpan\\\"><a id=\\\"ShareHelpLink\\\"></a> <img id=\\\"ShareHelpImg\\\" alt=\\\"\\\" /></span> <span id=\\\"ShareBackSpan\\\"><a id=\\\"ShareBack\\\" title=\\\"Back To Translation\\\"></a> Back</span></div>\r\n<input id=\\\"EmailSubject\\\" name=\\\"EmailSubject\\\" type=\\\"hidden\\\" value=\\\"Check out this page in {0} translated from {1}\\\" /> <input id=\\\"EmailBody\\\" name=\\\"EmailBody\\\" type=\\\"hidden\\\" value=\\\"Translated: {0}%0d%0aOriginal: {1}%0d%0a%0d%0aAutomatic translation powered by Microsoft&reg; Translator%0d%0ahttp://www.bing.com/translator?ref=MSTWidget\\\" /> <input id=\\\"ShareHelpText\\\" type=\\\"hidden\\\" value=\\\"This link allows visitors to launch this page and automatically translate it to {0}.\\\" /></div>\r\n<div id=\\\"FloaterEmbed\\\" style=\\\"display: none;\\\">\r\n<div id=\\\"EmbedTextDiv\\\"><span id=\\\"EmbedTextSpan\\\">EMBED THE SNIPPET BELOW IN YOUR SITE</span> <a id=\\\"EmbedHelpLink\\\" title=\\\"Copy this code and place it into your HTML.\\\"></a> <img id=\\\"EmbedHelpImg\\\" alt=\\\"\\\" /></div>\r\n<div id=\\\"EmbedTextboxDiv\\\"><input id=\\\"EmbedSnippetTextBox\\\" name=\\\"EmbedSnippetTextBox\\\" readonly=\\\"readonly\\\" type=\\\"text\\\" value=\\\"&lt;div id=\\\'MicrosoftTranslatorWidget\\\' class=\\\'Dark\\\' style=\\\'color:white;background-color:#555555\\\'&gt;&lt;/div&gt;&lt;script type=\\\'text/javascript\\\'&gt;setTimeout(function(){var s=document.createElement(\\\'script\\\');s.type=\\\'text/javascript\\\';s.charset=\\\'UTF-8\\\';s.src=((location &amp;&amp; location.href &amp;&amp; location.href.indexOf(\\\'https\\\') == 0)?\\\'https://ssl.microsofttranslator.com\\\':\\\'http://www.microsofttranslator.com\\\')+\\\'/ajax/v3/WidgetV3.ashx?siteData=ueOIGRSKkd965FeEGM5JtQ**&amp;ctf=true&amp;ui=true&amp;settings=manual&amp;from=en\\\';var p=document.getElementsByTagName(\\\'head\\\')[0]||document.documentElement;p.insertBefore(s,p.firstChild); },0);&lt;/script&gt;\\\" /></div>\r\n<div id=\\\"EmbedNoticeDiv\\\"><span id=\\\"EmbedNoticeSpan\\\">Enable collaborative features and customize widget: <a href=\\\"http://www.bing.com/widget/translator\\\" target=\\\"_blank\\\" rel=\\\"noopener\\\">Bing Webmaster Portal</a></span></div>\r\n<div id=\\\"EmbedFooterDiv\\\"><span id=\\\"EmbedBackSpan\\\"><a title=\\\"Back To Translation\\\">Back</a></span></div>\r\n</div>\r\n</div>', NULL, NULL, 'false', '1', 'Please update new app', 'https://play.google.com/store/apps/details?id=com.posts365.brandingapp', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `settings_player`
--

CREATE TABLE `settings_player` (
  `id` int(11) NOT NULL,
  `player_style` varchar(255) DEFAULT NULL,
  `player_watermark` varchar(255) DEFAULT NULL,
  `player_logo` varchar(255) DEFAULT NULL,
  `player_logo_position` varchar(255) DEFAULT NULL,
  `player_url` varchar(255) DEFAULT NULL,
  `autoplay` varchar(255) NOT NULL DEFAULT 'false',
  `pip_mode` varchar(255) NOT NULL DEFAULT 'ON',
  `rewind_forward` varchar(255) NOT NULL DEFAULT 'ON',
  `player_ad_on_off` varchar(255) NOT NULL DEFAULT 'OFF',
  `ad_offset` varchar(255) DEFAULT NULL,
  `ad_skip` varchar(255) DEFAULT NULL,
  `ad_web_url` varchar(255) DEFAULT NULL,
  `ad_video_type` varchar(255) NOT NULL DEFAULT 'Local',
  `ad_video_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings_player`
--

INSERT INTO `settings_player` (`id`, `player_style`, `player_watermark`, `player_logo`, `player_logo_position`, `player_url`, `autoplay`, `pip_mode`, `rewind_forward`, `player_ad_on_off`, `ad_offset`, `ad_skip`, `ad_web_url`, `ad_video_type`, `ad_video_url`) VALUES
(1, 'videojs_style1', 'ON', 'upload/images/logo.png', 'RT', '#', 'true', 'ON', 'ON', 'OFF', '0', '5', 'https://codecanyon.net/item/video-streaming-portal-tv-shows-movies-sports-videos-streaming/25581885', 'Local', 'upload/files/ad_video.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `slider_title` varchar(500) NOT NULL,
  `slider_image` varchar(255) NOT NULL,
  `slider_type` varchar(255) DEFAULT NULL,
  `slider_post_id` int(11) DEFAULT NULL,
  `slider_display_on` varchar(255) NOT NULL DEFAULT 'Home',
  `slider_url` text DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slider_title`, `slider_image`, `slider_type`, `slider_post_id`, `slider_display_on`, `slider_url`, `status`) VALUES
(3, 'Shamshera', 'upload/images/Shamshera-New.jpg', 'Movies', 13, 'Home,Movies,Sports,LiveTV', 'http://vstar.apptific.com/series/house-of-cards/3', 1),
(6, 'Ms. Marvel', 'upload/images/ms_marvel_poster_new.png', 'Shows', 7, 'Home,Shows,Sports,LiveTV', 'http://vstar.apptific.com/movies/fast-furious-presents-hobbs-shaw/15', 1),
(7, 'The Terminal List', 'upload/images/The_Terminal_List_New.jpg', 'Shows', 1, 'Home,Shows,Sports,LiveTV', 'http://vstar.apptific.com/series/sacred-games/4', 1),
(8, 'Thor Love and Thunder', 'upload/images/thor_love_and_thunder.jpg', 'Movies', 27, 'Home,Movies,Shows,Sports,LiveTV', NULL, 1),
(9, 'Jayeshbhai Jordaar', 'upload/images/jayeshbhai_jordaar.jpg', 'Movies', 42, 'Home,Movies,Shows,Sports,LiveTV', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sports_category`
--

CREATE TABLE `sports_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sports_category`
--

INSERT INTO `sports_category` (`id`, `category_name`, `category_slug`, `status`) VALUES
(8, 'Archery', 'archery', 1),
(9, 'Badminton', 'badminton', 1),
(10, 'Cricket', 'cricket', 1),
(11, 'Car racing', 'car-racing', 1),
(12, 'Football', 'football', 1),
(14, 'Hokey', 'hokey', 1),
(15, 'Athletics', 'athletics', 1),
(16, 'Khelo India', 'khelo-india', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sports_videos`
--

CREATE TABLE `sports_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_access` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Paid',
  `sports_cat_id` int(11) NOT NULL,
  `video_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` int(11) DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_slug` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_quality` int(1) DEFAULT NULL,
  `video_url` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url_480` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url_720` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url_1080` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download_enable` int(1) DEFAULT NULL,
  `download_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_on_off` int(1) DEFAULT NULL,
  `subtitle_language1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_url1` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_language2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_url2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_language3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_url3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keyword` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` bigint(20) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sports_videos`
--

INSERT INTO `sports_videos` (`id`, `video_access`, `sports_cat_id`, `video_title`, `date`, `duration`, `video_description`, `video_slug`, `video_image`, `video_type`, `video_quality`, `video_url`, `video_url_480`, `video_url_720`, `video_url_1080`, `download_enable`, `download_url`, `subtitle_on_off`, `subtitle_language1`, `subtitle_url1`, `subtitle_language2`, `subtitle_url2`, `subtitle_language3`, `subtitle_url3`, `seo_title`, `seo_description`, `seo_keyword`, `views`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Free', 10, 'Mandhana, Harmanpreet, Bhatia and bowlers help India take 1-0 lead', 1663545600, '45m', '<p>Smriti Mandhana\\\'s 91 and contrasting half-centuries from Yastika Bhatia (50) and skipper Harmanpreet Kaur (74 not out) put India 1-0 ahead in the three-match ODI series against hosts England in Hove. Having opted to field first, a disciplined bowling effort from India saw England being restricted to 227/7. Mandhana then put on two 90-plus partnerships to help India to a comfortable seven wicket victory, and thereby two ICC Women\\\'s ODI Championship points.</p>', 'mandhana-harmanpreet-bhatia-and-bowlers-help-india-take-1-0-lead', 'upload/images/Mandhana.jpg', 'Local', 0, 'upload/files/dolbycanyon_MP4.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 14, 1, NULL, '2022-11-14 08:24:14'),
(2, 'Free', 12, 'East Bengal FC 0-1 Chennaiyin FC', -19800, NULL, '<p>Smriti Mandhana\\\'s 91 and contrasting half-centuries from Yastika Bhatia (50) and skipper Harmanpreet Kaur (74 not out) put India 1-0 ahead in the three-match ODI series against hosts England in Hove. Having opted to field first, a disciplined bowling effort from India saw England being restricted to 227/7. Mandhana then put on two 90-plus partnerships to help India to a comfortable seven wicket victory, and thereby two ICC Women\\\'s ODI Championship points.</p>', 'east-bengal-fc-0-1-chennaiyin-fc', 'upload/images/East_Bengal_FC.jpg', 'Local', 0, 'upload/files/dolbycanyon_MP4.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 2, 1, NULL, '2022-11-08 08:46:54'),
(3, 'Paid', 9, 'Badminton Junior World Highlights', 0, NULL, '<p>Smriti Mandhana\\\'s 91 and contrasting half-centuries from Yastika Bhatia (50) and skipper Harmanpreet Kaur (74 not out) put India 1-0 ahead in the three-match ODI series against hosts England in Hove. Having opted to field first, a disciplined bowling effort from India saw England being restricted to 227/7. Mandhana then put on two 90-plus partnerships to help India to a comfortable seven wicket victory, and thereby two ICC Women\\\'s ODI Championship points.</p>', 'badminton-junior-world-highlights', 'upload/images/Badminton.jpg', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 1, 1, NULL, '2022-11-16 11:17:49'),
(4, 'Free', 8, 'Archery Olympic Team', -19800, NULL, '<p>Smriti Mandhana\\\'s 91 and contrasting half-centuries from Yastika Bhatia (50) and skipper Harmanpreet Kaur (74 not out) put India 1-0 ahead in the three-match ODI series against hosts England in Hove. Having opted to field first, a disciplined bowling effort from India saw England being restricted to 227/7. Mandhana then put on two 90-plus partnerships to help India to a comfortable seven wicket victory, and thereby two ICC Women\\\'s ODI Championship points.</p>', 'archery-olympic-team', 'upload/images/Team-Canada-Steaphanie.jpg', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 3, 1, NULL, '2022-11-16 11:01:17'),
(5, 'Paid', 11, 'Lamborghini Race Cars Ultimte Guide & Full List', 0, NULL, '<p>Smriti Mandhana\\\'s 91 and contrasting half-centuries from Yastika Bhatia (50) and skipper Harmanpreet Kaur (74 not out) put India 1-0 ahead in the three-match ODI series against hosts England in Hove. Having opted to field first, a disciplined bowling effort from India saw England being restricted to 227/7. Mandhana then put on two 90-plus partnerships to help India to a comfortable seven wicket victory, and thereby two ICC Women\\\'s ODI Championship points.</p>', 'lamborghini-race-cars-ultimte-guide-full-list', 'upload/images/Lamborghini-Race-Cars.jpg', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 5, 1, NULL, '2022-12-07 10:32:33'),
(6, 'Free', 14, 'Sentetik Çim Hokey Sahası Nedir', -19800, NULL, '<p>Smriti Mandhana\\\'s 91 and contrasting half-centuries from Yastika Bhatia (50) and skipper Harmanpreet Kaur (74 not out) put India 1-0 ahead in the three-match ODI series against hosts England in Hove. Having opted to field first, a disciplined bowling effort from India saw England being restricted to 227/7. Mandhana then put on two 90-plus partnerships to help India to a comfortable seven wicket victory, and thereby two ICC Women\\\'s ODI Championship points.</p>', 'sentetik-cim-hokey-sahasi-nedir', 'upload/images/sentetik-cim-hokey-sahasi-nedir.jpg', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 0, 1, NULL, '2022-11-08 08:54:19'),
(7, 'Free', 16, 'Highlights: Wrestling, Day 9', -19800, NULL, '<p>Smriti Mandhana\\\'s 91 and contrasting half-centuries from Yastika Bhatia (50) and skipper Harmanpreet Kaur (74 not out) put India 1-0 ahead in the three-match ODI series against hosts England in Hove. Having opted to field first, a disciplined bowling effort from India saw England being restricted to 227/7. Mandhana then put on two 90-plus partnerships to help India to a comfortable seven wicket victory, and thereby two ICC Women\\\'s ODI Championship points.</p>', 'highlights-wrestling-day-9', 'upload/images/PTI07_31_2022_000281B_0_1200x768.jpg', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 9, 1, NULL, '2022-12-07 10:31:41'),
(8, 'Free', 15, 'Delhi Half Marathon', -19800, NULL, '<p>Smriti Mandhana\\\'s 91 and contrasting half-centuries from Yastika Bhatia (50) and skipper Harmanpreet Kaur (74 not out) put India 1-0 ahead in the three-match ODI series against hosts England in Hove. Having opted to field first, a disciplined bowling effort from India saw England being restricted to 227/7. Mandhana then put on two 90-plus partnerships to help India to a comfortable seven wicket victory, and thereby two ICC Women\\\'s ODI Championship points.</p>', 'delhi-half-marathon', 'upload/images/Delhi_Half_Marathon.jpg', 'URL', 0, 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 0, 1, NULL, '2022-11-08 08:54:05'),
(9, 'Free', 10, 'India, England Lock Horns in WC Semis', -19800, NULL, '<div class=\\\"description\\\">India will face a determined England on November 10th at 1:30 PM IST for a spot in the final of the ICC Men\\\'s T20 World Cup 2022</div>', 'india-england-lock-horns-in-wc-semis', 'upload/images/India_England_Lock_Horns.jpg', 'Local', 0, 'upload/files/dolbycanyon_mkv.mkv', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 0, 1, NULL, '2022-11-10 05:44:59'),
(10, 'Free', 10, 'Ind vs Eng: All You Need to Know', 0, NULL, '<p>India take on England in the semi-finals of ICC Men\\\'s T20 World Cup 2022 and here\\\'s everything you need to know</p>', 'ind-vs-eng-all-you-need-to-know', 'upload/images/INDIA-vs-ENGLAND.jpg', 'Local', 0, 'upload/files/dolbycanyon_MP4.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 0, 1, NULL, NULL),
(11, 'Free', 10, 'Aus Pip Afg to Stay in SF Contention', 0, NULL, '<div class=\\\"description\\\">Australia wrestled past a stubborn Afghanistan by four runs to keep their hopes alive in ICC Men&rsquo;s T20 World Cup 2022</div>', 'aus-pip-afg-to-stay-in-sf-contention', 'upload/images/Aus_Afg.jpg', 'Local', 0, 'upload/files/dolbycanyon_mkv.mkv', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 0, 1, NULL, NULL),
(12, 'Free', 10, 'SL Shatter Afghan\\\'s SF Hopes', 0, NULL, '<div class=\\\"description\\\">Sri Lanka knocked out Afghanistan with a six-wicket win and stayed in the hunt for a ICC Men\\\'s T20 World Cup 2022 semi-final spot</div>', 'sl-shatter-afghans-sf-hopes', 'upload/images/SL_Afghan\'s_SF.jpg', 'Local', 0, 'upload/files/dolbycanyon_MP4.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 2, 1, NULL, '2022-11-14 12:27:50'),
(13, 'Free', 10, 'Ind Thrash Zim, Top Group to Make SF', 0, NULL, '<div class=\\\"description\\\">Suryakumar Yadav\\\'s rapid 61* helped India crush Zimbabwe by 71 runs and set up a semi-final clash against England in ICC Men\\\'s T20 World Cup 2022</div>', 'ind-thrash-zim-top-group-to-make-sf', 'upload/images/Ind_Thrash_Zim.jpg', 'Local', 0, 'upload/files/dolbycanyon_mkv.mkv', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 0, 1, NULL, NULL),
(14, 'Free', 9, 'Thalaivas 39-31 Titans', 0, NULL, '<div class=\\\"description\\\">Tamil Thalaivas flipped the script on bottom-placed Telugu Titans in a closely-fought Southern Derby in vivo Pro Kabaddi 2022</div>', 'thalaivas-39-31-titans', 'upload/images/Pro_Kabaddi.jpg', 'Local', 0, 'upload/files/dolbycanyon_mkv.mkv', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 2, 1, NULL, '2022-11-16 11:17:54'),
(15, 'Free', 16, 'Warriors 41-41 Yoddhas', 0, NULL, '<div class=\\\"description\\\">Bengal Warriors staged a stunning comeback to share the spoils with U.P. Yoddhas in vivo Pro Kabaddi 2022</div>', 'warriors-41-41-yoddhas', 'upload/images/Warriors-41-41-Yoddhas.jpg', 'Local', 0, 'upload/files/dolbycanyon_mkv.mkv', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 0, 1, NULL, NULL),
(16, 'Free', 14, 'Replay: China vs Belgium, 2nd Leg', -19800, NULL, '<div class=\\\"description\\\">Watch replay of the second leg of the Women\\\'s FIH Olympic Qualifiers match between China and Belgium</div>', 'replay-china-vs-belgium-2nd-leg', 'upload/images/Replay_China_vs_Belgium.jpg', 'Local', 0, 'upload/files/dolbycanyon_mkv.mkv', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 0, 1, NULL, '2022-11-10 07:05:53'),
(17, 'Free', 14, '1st Leg: India 4-2 Russia', -19800, NULL, '<div class=\\\"description\\\">India romped to a 4-2 win over Russia in Men\\\'s FIH Olympic Qualifiers 2019</div>', '1st-leg-india-4-2-russia', 'upload/images/Russia_Men_FIH_Olympic.jpg', 'Local', 0, 'upload/files/dolbycanyon_MP4.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 0, 1, NULL, '2022-11-10 07:05:46'),
(18, 'Free', 15, 'Japan hammer Dominican Republic 3-0', -19800, NULL, '<div class=\\\"description\\\">Japan made easy work of Dominican Republic by winning in three straight sets in the Women\\\'s Volleyball Qualifiers</div>', 'japan-hammer-dominican-republic-3-0', 'upload/images/Volleyball_Olympic_Qualifiers.jpg', 'Local', 0, 'upload/files/dolbycanyon_MP4.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 0, 1, NULL, '2022-11-10 11:00:41'),
(19, 'Free', 16, 'Highlights: Athletics, Day 7', 0, NULL, '<div class=\\\"description\\\">Watch Athletics highlights from Day 7 of Khelo India University Games 2022</div>', 'highlights-athletics-day-7', 'upload/images/Watch_Athletics_Highlights_Khelo_India.jpg', 'Local', 0, 'upload/files/dolbycanyon_MP4.mp4', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 0, 1, NULL, NULL),
(20, 'Free', 16, 'Jai Ho! A Tokyo Games Special', 0, NULL, '<div class=\\\"description\\\">Catch a special series featuring India\\\'s medal winners at the Tokyo Games 2020, where the Indian contingent picked up a record 7 medals</div>', 'jai-ho-a-tokyo-games-special', 'upload/images/catch_special_series_medals.jpg', 'Local', 0, 'upload/files/dolbycanyon_mkv.mkv', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 5, 1, NULL, '2022-11-10 08:54:00'),
(21, 'Free', 16, 'Champions Atletico Celebrate in Style', 0, NULL, '<div class=\\\"description\\\">Atletico de Kolkata are crowned the first Hero Indian Super League (ISL) champions. It\\\'s been a long journey, a tiring one, but happiness at the end of it all was clear on the faces of the Kolkata players. They set the ball rolling on October 12 at the Salt Lake Stadium, and finished with a bang in Mumbai on December 20!</div>', 'champions-atletico-celebrate-in-style', 'upload/images/LaLiga-Champions-2021.jpg', 'Local', 0, 'upload/files/dolbycanyon_mkv.mkv', NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plan`
--

CREATE TABLE `subscription_plan` (
  `id` int(11) NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `plan_days` int(11) NOT NULL,
  `plan_duration` varchar(255) NOT NULL,
  `plan_duration_type` varchar(255) NOT NULL,
  `plan_price` decimal(11,2) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscription_plan`
--

INSERT INTO `subscription_plan` (`id`, `plan_name`, `plan_days`, `plan_duration`, `plan_duration_type`, `plan_price`, `status`) VALUES
(1, 'Basic Plan', 7, '7', '1', '10.00', 1),
(2, 'Premium Plan', 30, '1', '30', '29.00', 1),
(3, 'Platinum Plan', 365, '1', '365', '99.00', 1),
(4, 'Free Plan', 1, '1', '1', '0.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `gateway` varchar(255) NOT NULL,
  `payment_amount` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usertype` varchar(255) CHARACTER SET latin1 DEFAULT 'User',
  `login_status` int(1) NOT NULL DEFAULT 0,
  `google_id` varchar(255) DEFAULT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `user_address` varchar(500) DEFAULT NULL,
  `user_image` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `plan_id` int(11) DEFAULT 0,
  `start_date` int(11) DEFAULT NULL,
  `exp_date` int(11) DEFAULT NULL,
  `plan_amount` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `confirmation_code` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `session_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `login_status`, `google_id`, `facebook_id`, `name`, `email`, `password`, `phone`, `user_address`, `user_image`, `status`, `plan_id`, `start_date`, `exp_date`, `plan_amount`, `confirmation_code`, `remember_token`, `session_id`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 0, NULL, NULL, 'Viavi Webtech', 'admin@admin.com', '$2y$10$EMeDkbAwIXJd7fAX0pWF2OZCHmKuGMwtD3ZUjg9HEOMvkaVl.5Xvm', '9227777522', NULL, 'viavi-webtech-1f2416ecff3faba4159de6b399477081-b.jpg', 1, 2, 0, 2592000, '0.00', NULL, 'MUjf7JTf42GV3hEJiLukfUexYCYJ2tjbkdfkjl4x0uLgRRVNlW3XOeC0yJPg', 'iXL5Efee1FhfiXQzxPTe2PzEfFqU3seM3b6TzvU7', '2020-03-12 04:16:45', '2022-12-12 05:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `post_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`id`, `user_id`, `post_id`, `post_type`) VALUES
(3, 1, 1, 'Sports'),
(4, 1, 14, 'Movies'),
(5, 8, 1, 'Sports'),
(6, 8, 1, 'LiveTV'),
(7, 1, 7, 'Sports'),
(8, 1, 4, 'Sports'),
(9, 1, 42, 'Movies'),
(10, 8, 42, 'Movies'),
(11, 8, 34, 'Movies'),
(12, 8, 35, 'Movies'),
(13, 8, 31, 'Shows'),
(14, 8, 33, 'Shows'),
(16, 12, 16, 'LiveTV');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actor_director`
--
ALTER TABLE `actor_director`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_ads`
--
ALTER TABLE `app_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channels_list`
--
ALTER TABLE `channels_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channel_category`
--
ALTER TABLE `channel_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_status_date` (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_sections`
--
ALTER TABLE `home_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_videos`
--
ALTER TABLE `movie_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_status_date` (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `payment_gateway`
--
ALTER TABLE `payment_gateway`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payu_transactions`
--
ALTER TABLE `payu_transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payu_transactions_transaction_id_unique` (`transaction_id`),
  ADD KEY `payu_transactions_status_index` (`status`),
  ADD KEY `payu_transactions_verified_at_index` (`verified_at`);

--
-- Indexes for table `recently_watched`
--
ALTER TABLE `recently_watched`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings_android_app`
--
ALTER TABLE `settings_android_app`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings_player`
--
ALTER TABLE `settings_player`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sports_category`
--
ALTER TABLE `sports_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sports_videos`
--
ALTER TABLE `sports_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_status_date` (`id`);

--
-- Indexes for table `subscription_plan`
--
ALTER TABLE `subscription_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actor_director`
--
ALTER TABLE `actor_director`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `app_ads`
--
ALTER TABLE `app_ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `channels_list`
--
ALTER TABLE `channels_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `channel_category`
--
ALTER TABLE `channel_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `home_sections`
--
ALTER TABLE `home_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `movie_videos`
--
ALTER TABLE `movie_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_gateway`
--
ALTER TABLE `payment_gateway`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payu_transactions`
--
ALTER TABLE `payu_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recently_watched`
--
ALTER TABLE `recently_watched`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `season`
--
ALTER TABLE `season`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings_android_app`
--
ALTER TABLE `settings_android_app`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings_player`
--
ALTER TABLE `settings_player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sports_category`
--
ALTER TABLE `sports_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sports_videos`
--
ALTER TABLE `sports_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `subscription_plan`
--
ALTER TABLE `subscription_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `watchlist`
--
ALTER TABLE `watchlist`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;