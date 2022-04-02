-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2022 at 08:28 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogsites`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Technology'),
(2, 'Food'),
(3, 'Health and Life'),
(4, 'Entertainment'),
(5, 'Sports'),
(6, 'Culture ');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `post_auther` varchar(255) NOT NULL,
  `post_auther_email` varchar(255) NOT NULL,
  `cmt_desc` varchar(255) NOT NULL,
  `cmt_status` int(2) NOT NULL,
  `cmt_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `post_auther`, `post_auther_email`, `cmt_desc`, `cmt_status`, `cmt_date`) VALUES
(1, 11, ' Mr.Abcd', ' abcd@mail.com', 'Awesome ', 1, '2022-03-31'),
(2, 11, ' Rajib Islam', ' rajib@mail.com', 'two-match Test series against South Africa at Hollywoodbets Kingsmead Stadium in Durban,', 1, '2022-04-01'),
(4, 12, ' Mr.xxx', ' ddd@mail.com', 'remember our hangouts in Kamalapur rail line, Manumita Hotel, Chittagong Hotel and Motijheel petrol pump. There was music too, there was everything!', 1, '2022-04-01'),
(5, 12, ' dfsfd', ' jgh@mhh.com', 'He said, “Azam was supposed to go to Singapore for treatment before his demise. I knew he was going to Singapore and called him. After finishing the conversation he said to me, \"D', 0, '2022-04-01'),
(6, 12, ' dfsfd', ' jgh@mhh.com', 'He said, “Azam was supposed to go to Singapore for treatment before his demise. I knew he was going to Singapore and called him. After finishing the conversation he said to me, \"D', 0, '2022-04-01'),
(7, 12, ' dfsfd', ' jgh@mhh.com', 'He said, “Azam was supposed to go to Singapore for treatment before his demise. I knew he was going to Singapore and called him. After finishing the conversation he said to me, \"D', 0, '2022-04-01'),
(8, 12, ' dfsfd', ' jgh@mhh.com', 'He said, “Azam was supposed to go to Singapore for treatment before his demise. I knew he was going to Singapore and called him. After finishing the conversation he said to me, \"D', 0, '2022-04-01'),
(9, 12, ' dfsfd', ' jgh@mhh.com', 'He said, “Azam was supposed to go to Singapore for treatment before his demise. I knew he was going to Singapore and called him. After finishing the conversation he said to me, \"D', 0, '2022-04-01'),
(10, 9, ' Ushan', ' usahn@mail.com', 'Neurosciences, have been studying people with Familial Natural Short Sleep (FNSS), the ability to function fully on -- and have a preference for -- four to six hours of sleep a night. They\'ve shown', 1, '2022-04-01'),
(11, 9, ' ghfghf', ' fhgf@fg', '', 0, '2022-04-01'),
(12, 11, ' Mr.Prodip ', ' prodip@mail.com', 'Awesome', 0, '2022-04-01'),
(13, 11, ' Dipok', ' dipok@mail.com', 'Bangladesh Choose To Bowl First, No Tamim, Shariful', 1, '2022-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_description` text NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_thumb` text NOT NULL,
  `post_category` int(11) NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_description`, `post_author`, `post_thumb`, `post_category`, `post_tags`, `post_date`) VALUES
(3, 'JavaScript News and Updates of January 2022', ' Greetings to all JavaScript admirers and welcome to the first news digest of 2022! I am excited to continue sharing with you interesting bits of news, releases, and useful tips from the JavaScript world. Get to delve into interesting facts from the JavaScript Rising Star report, details of the AngularJS discontinuation, and an unusual malicious attack on popular open-source libraries. I’ll also provide you with a review of recent updates for TypeScript, Deno, and DHTMLX Suite. The second part of the digest includes a pack of useful materials to boost your JavaScript knowledge.', 'Dipta Saha Partha', '1215_img.jpg', 1, 'Technology', '2022-03-30'),
(4, '2021 JavaScript Rising Star: Latest Overview of JavaScript Technologies', ' It is hard to make predictions on the future of JavaScript without knowing about the trendy JavaScript tools of 2021. The 6th edition of the JavaScript Rising Star report allows us to become familiar with the most starred JavaScript projects on GitHub.', 'Arpita Saha', 'formvalidation.png', 4, 'Technology', '2022-03-31'),
(8, 'Naptime for preschoolers may bolster literacy skills', ' There is little known research about the relationship between sleep, memory development, and literacy skills. A new study has provided initial evidence that daytime naps could be beneficial for preschool children\'s learning of letter-sound skills.\r\n\r\nThe findings of the study were published in the journal - \'Child Development\'. The research, conducted by scholars at Macquarie University in Australia, the University of Oxford, the University of York and the University of Sheffield investigated whether a daytime nap supports preschool children\'s ability to learn letter sounds and to transfer this newly learned knowledge to the recognition of printed words.\r\n\r\nAdvertisement\r\n\"Having a nap after learning might facilitate the capacity to utilise newly learned information in a new task,\" said Hua-Chen Wang, lecturer in the School of Education at Macquarie University.\r\n\r\n\"We found a positive nap effect on children\'s learning of letter-sound mappings, and in particular, using that knowledge to read unfamiliar words.\"\r\n\r\nThirty-two three-to-five-year-old children from two daycare centres in Sydney, Australia who napped regularly participated in the study. The daycare centres did not provide formal teaching of letter names or sounds.\r\n\r\nEach child participated in seven sessions over two to four weeks which included the following:\r\n\r\nPre-test: To establish baseline levels of letter-sound knowledge.\r\n\r\nLetter-sound mapping training: Held a week apart under both \"nap\" and \"no-nap conditions.\"\r\n\r\nPost-tests: To assess learning once after a nap and once after a period of wakefulness. To examine whether any effect of nap on learning was maintained, knowledge was also reassessed one day later. Each session assessed letter-sound mappings and using explicit learning and knowledge generalisation tasks.', 'Arnob Saha', '8349_post.png', 3, 'Child Care ', '2022-03-31'),
(9, 'Sleep quality is more important than quantity', ' According to researchers at UC San Francisco, people who are gifted with genes that pack the benefits of slumber into an efficient time window, show psychological resilience and resistance to neurodegenerative conditions that may fend off neurological disease.\r\n\r\nThe findings of the study were published in the journal \'iScience\'. \"There\'s a dogma in the field that everyone needs eight hours of sleep, but our work to date confirms that the amount of sleep people need differs based on genetics,\" said neurologist Louis Ptacek, MD, one of the senior authors on the study. \"Think of it as analogous to the height, there\'s no perfect amount of height, each person is different. We\'ve shown that the case is similar for sleep.\"\r\n\r\nAdvertisement\r\nFor over a decade, Ptacek and co-senior author, Ying-Hui Fu, PhD, both members of the UCSF Weill Institute for Neurosciences, have been studying people with Familial Natural Short Sleep (FNSS), the ability to function fully on -- and have a preference for -- four to six hours of sleep a night. They\'ve shown that it runs in families and, thus far have identified five genes across the genome that play a role in enabling this efficient sleep. There are still many more FNSS genes to find, the researchers said.\r\n\r\nThis study tested Fu\'s hypothesis that elite sleep can be a shield against neurodegenerative disease. Her ideas contrast somewhat with current thinking that, for many people, lack of sleep can accelerate neurodegeneration. The difference, Fu said, is that with FNSS, the brain accomplishes its sleep tasks in a shorter time. In other words, less time spent efficiently sleeping may not equate to a lack of sleep.\r\n\r\nThe team chose to look at mouse models of Alzheimer\'s disease because that condition is so prevalent, said Fu. They bred mice that had both short-sleep genes and genes that predisposed them to Alzheimer\'s and found that their brains developed much less of the hallmark aggregates associated with dementia. To confirm their findings, they repeated the experiment using mice with a different short-sleep gene and another dementia gene and saw similar results.', 'Arnob Saha', '6568_postOne.png', 3, 'Health tips', '2022-03-31'),
(10, 'Will Smith apologizes to Chris Rock for slap, academy weighs action', ' Will Smith apologised to Chris Rock on Monday for slapping the comedian at Sunday night’s Oscars ceremony, issuing a statement after the film academy said it might take action against Smith for an incident that overshadowed the industry’s top awards.\r\n\r\nSmith, in a post on Instagram, said his behavior at the televised ceremony was “unacceptable and inexcusable.”\r\n\r\n“I would like to publicly apologize to you, Chris,” Smith wrote. “I was out of line and I was wrong.”\r\n\r\nAdvertisement\r\nSmith strode on stage and struck Rock in the face after the comedian made a joke about the appearance of Smith’s wife. Less than an hour later, Smith won best actor for his role as the father of tennis stars Venus and Serena Williams in “King Richard.”\r\n\r\nRock, in a joke about Jada Pinkett Smith, had referenced the 1997 film “G.I. Jane” in which actress Demi Moore shaved her head. It was unclear whether Rock was aware that Smith’s wife has a disease that causes hair loss.\r\n\r\n“Jokes at my expense are part of the job,” Smith said on Monday, “but a joke about Jada’s medical condition was too much for me to bear and I reacted emotionally.”\r\n\r\n“I am embarrassed and my actions were not indicative of the man I want to be,” he added.\r\n\r\nEarlier Monday, the 9,900-member Academy of Motion Picture Arts and Sciences condemned Smith’s actions and said it was reviewing the matter.\r\n\r\n“We have officially started a formal review around the incident and will explore further action and consequences in accordance with our Bylaws, Standards of Conduct and California law,” the academy added.\r\n\r\nThe group’s conduct policy states it is “opposed to any form of abuse, harassment or discrimination” and expects members to uphold the values “of respect for human dignity, inclusion, and a supportive environment that fosters creativity.”\r\n\r\nViolations may result in suspension or expulsion from the organization, revocation of Oscars, or loss of eligibility for future awards, according to the policy.\r\n\r\nSAG-AFTRA, the union that represents actors, called the Smith’s actions “unacceptable” and said it had been in touch with the academy and broadcaster ABC “to ensure this behavior is appropriately addressed.”\r\n\r\nIt is rare but not unprecedented for the film academy to revoke membership. Producer Harvey Weinstein was expelled in 2017 after more than three dozen women accused him of sexual assault.\r\n\r\nIn his statement, Smith also apologized to the academy, show producers, attendees, viewers, the Williams family and “my King Richard family.”\r\n\r\nStudio executives were publicly silent about Smith on Monday. The 53-year-old actor has projects in the works with Netflix Inc NFLX.O, Walt Disney Co DIS.N and Apple TV+ AAPL.O. The companies did not respond to requests for comment. Read full story\r\n\r\nOne of Hollywood’s most bankable stars, Smith has anchored lucrative film franchises such as “Independence Day” and “Men in Black.” His films have grossed more than $9 billion at global box offices, according to researcher Comscore.\r\n\r\nOscars producers had been hoping for a memorable night on Sunday to rebound from record-low ratings during the COVID-19 pandemic. They brought in three hosts, opened the show with Beyonce and shortened some acceptance speeches.\r\n\r\nBut it was Smith’s outburst that went viral, with pictures and video ricocheting across social media.\r\n\r\nTelevision viewership jumped sharply this year, to an average of 15.36 million people, a 56 per cent boost from 2021, according to preliminary estimates.\r\n\r\nFeel-good movie “CODA” won best picture, marking a turning point in Hollywood because the film was streamed by Apple TV+ AAPL.O rather than debuting exclusively to theaters.\r\n\r\nMany Hollywood celebrities denounced Smith’s actions.\r\n\r\n“Will Smith owes Chris Rock a huge apology. There is no excuse for what he did,” filmmaker Rob Reiner said on Twitter.\r\n\r\nOthers supported Smith for defending his wife.\r\n\r\n“That’s what your husband is supposed to do, right? Protect you,” comedian Tiffany Haddish told People magazine.', 'Dipta Saha Partha', '5228_will.png', 4, 'Hollywood', '2022-03-31'),
(11, 'Bangladesh choose to bowl first, no Tamim, Shariful', ' Bangladesh skipper Mominul Haque won the toss and choose to bowl first in the first game of the two-match Test series against South Africa at Hollywoodbets Kingsmead Stadium in Durban, South Africa on Thursday.\r\n\r\nAs a big blow to Bangladesh team line-up, opener Tamim Iqbal was rested because of stomach ache while pacer Shoriful Islam was rested due to minor niggles.\r\n\r\nAdvertisement\r\nRyan Rickleton and Lizaad Williams made debut for South Africa in the match while Simon Harmer made a comeback after seven years. He last played in a Test match in 2015.\r\n\r\nTiger captain Mominul said they are more experienced side and hoped to play accordingly. He also hoped pacers would lead Bangladesh in the match.\r\n\r\nTeams\r\n\r\nBangladesh: 1 Mominul Haque, 2 Shadman Islam, 3 Mahmudul Hasan Joy, 4 Najmul Hossain Shanto, 5 Mushfiqur Rahim, 6 Yasir Ali, 7 Litton Das (wk), 8 Mehidy Hasan Miraz, 9 Taskin Ahmed, 10 Khaled Ahmed, 11 Ebadot Hossain\r\n\r\nSouth Africa: 1 Dean Elgar, 2 Sarel Erwee, 3 Kegan Petersen, 4 Temba Bavuma, 5 Ryan Rickleton, 6 Kyle Verreynne (wk), 7 Wiaan Mulder, 8 Keshav Maharaj, 9 Simon Harmer, 10 Lizaad Williams, 11 Duanne Olivier', 'Dipta Saha Partha', '6694_taskin.png', 5, 'Test Cricket', '2022-03-31'),
(12, 'Azam Khan, an unparalleled friend', ' Azam Khan is a magician of Bengali pop song, who also took part in the Liberation War. He was not just the king of pop or just a name, he was also the innovator of a new genre of Bengali music – who himself can be regarded as an incident or history which cannot be overlooked. If he was alive, we would have celebrated his 70th birth anniversary today. His earthly endeavour ended in a fight with cancer. Among his friends in the cultural sector, we talked with Ferdous Wahid and Fakir Alamgir. Their reminiscence revealed that how was Azam Khan as a human being and friend.\r\nFive days before death, Azam Khan talked with his friend Ferdous Wahid. He shared some words with his friend (Azam Khan). Ferdous Wahid also remembered this conversation yesterday. He said, “Azam was supposed to go to Singapore for treatment before his demise. I knew he was going to Singapore and called him. After finishing the conversation he said to me, \"Do not stop your music in anger. The field is empty. The people are different now-a-days. Then we remained silent for some moment. I changed the topic to make him easy. These were my last words with him.”\r\n\r\nAzam Khan and Fakir Alamgir lived near each other. One lived in Kamalapur, the other in Khilgaon. They both were affiliated with “Kranti Shilpigosthi” (cultural organisation). Their leader was Nijamul Haque and Kamal Lohani, said Fakir Alamgir.\r\n\r\nHe said, “From his childhood, he was very fond of sports, music and hangouts. We used to walk through the rail lines. I still can remember our hangouts in Kamalapur rail line, Manumita Hotel, Chittagong Hotel and Motijheel petrol pump. There was music too, there was everything!”\r\n\r\n', 'Dipta Saha Partha', '158_azam.png', 6, 'Pop Music', '2022-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `logo` text DEFAULT NULL,
  `favicon` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `favicon`) VALUES
(1, '122903_logo.png', '43170_favicon.png');

-- --------------------------------------------------------

--
-- Table structure for table `socialmedia`
--

CREATE TABLE `socialmedia` (
  `id` int(11) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `s_link` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `socialmedia`
--

INSERT INTO `socialmedia` (`id`, `s_name`, `s_link`) VALUES
(1, 'Facebook', 'https'),
(2, 'Twitter', NULL),
(3, 'Instagram', NULL),
(4, 'Youtube', NULL),
(5, 'LinkedIn', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `role` int(3) NOT NULL COMMENT '1=Administrator; 2=Editor\r\n',
  `is_active` int(2) NOT NULL DEFAULT 0,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `phone`, `address`, `password`, `image`, `role`, `is_active`, `join_date`) VALUES
(2, 'Dipta Saha Partha', 'Dipta', 'dipta196@gmail.com', '01711417945', 'Dhaka, Bangladesh', '8cb2237d0679ca88db6464eac60da96345513964', '80355_profile.jpg', 1, 1, '2022-03-27'),
(5, 'Arpita Saha', 'arpita', 'arpita@gmail.com', '01950832302', 'address', '8cb2237d0679ca88db6464eac60da96345513964', '73013_ADMIN.png', 1, 0, '2022-03-28'),
(6, 'Prapto Saha', 'Prapto', 'prapto@mail.com', '01741798745', 'address', '8cb2237d0679ca88db6464eac60da96345513964', '147019_VBKHFD.png', 2, 0, '2022-03-28'),
(7, 'For Test', 'TEST', 'test@mail.com', '01755245655', 'Dhaka,Bangladesh', '8cb2237d0679ca88db6464eac60da96345513964', '131186_ADMIN.png', 2, 0, '2022-03-28'),
(8, 'Arnob Saha', 'arvob', 'arnob@mail.com', '01784123541', '', '8cb2237d0679ca88db6464eac60da96345513964', '', 2, 1, '2022-03-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socialmedia`
--
ALTER TABLE `socialmedia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `socialmedia`
--
ALTER TABLE `socialmedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
