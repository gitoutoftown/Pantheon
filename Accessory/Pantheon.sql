-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 08, 2018 at 11:47 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT
= 0;
START TRANSACTION;
SET time_zone
= "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Pantheon`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums`
(
  `id` int
(11) NOT NULL,
  `title` varchar
(250) NOT NULL,
  `artist` int
(11) NOT NULL,
  `genre` int
(11) NOT NULL,
  `artworkPath` varchar
(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`
id`,
`title
`, `artist`, `genre`, `artworkPath`) VALUES
(8, 'StaySafeMoveSmart', 40, 1, 'assets/images/artwork/stockAlbumArtboard.png'),
(9, 'StaySafeMoveSmart', 41, 11, 'assets/images/artwork/stockAlbumArtboard.png'),
(10, 'Keenan with A K', 42, 3, 'assets/images/artwork/stockAlbumArtboard.png'),
(11, 'Dont Keep Me Waiting', 43, 5, 'assets/images/artwork/stockAlbumArtboard.png'),
(15, 'Championships', 45, 11, 'assets/images/artwork/stockAlbumArtboard.png'),
(17, 'NULL', 46, 1, 'assets/images/artwork/stockAlbumArtboard.png'),
(18, 'Stay Safe Move Smart', 47, 1, 'assets/images/artwork/stockAlbumArtboard.png'),
(19, 'Mr.Perfect', 46, 1, 'assets/images/artwork/stockAlbumArtboard.png'),
(20, 'Tuna Talk', 48, 1, 'assets/images/artwork/stockAlbumArtboard.png'),
(21, 'Slimeball 3', 49, 1, 'assets/images/artwork/stockAlbumArtboard.png'),
(22, 'More Life', 50, 1, 'assets/images/artwork/stockAlbumArtboard.png'),
(23, 'Dummy Boy', 51, 1, 'assets/images/artwork/stockAlbumArtboard.png'),
(24, 'On The run', 52, 1, 'assets/images/artwork/stockAlbumArtboard.png'),
(25, 'C', 53, 4, 'assets/images/artwork/stockAlbumArtboard.png'),
(26, 'Negro Swan', 54, 4, 'assets/images/artwork/stockAlbumArtboard.png'),
(27, 'NULL', 55, 1, 'assets/images/artwork/stockAlbumArtboard.png'),
(28, 'The PinkPrint', 56, 1, 'assets/images/artwork/stockAlbumArtboard.png'),
(29, '', 57, 0, 'assets/images/artwork/stockAlbumArtboard.png'),
(30, 'The PinkPrint', 0, 1, 'assets/images/artwork/stockAlbumArtboard.png'),
(31, 'NULL', 0, 1, 'assets/images/artwork/stockAlbumArtboard.png'),
(32, 'C', 0, 2, 'assets/images/artwork/stockAlbumArtboard.png'),
(33, 'More Life', 0, 1, 'assets/images/artwork/stockAlbumArtboard.png'),
(34, 'comethazine', 58, 1, 'assets/images/artwork/stockAlbumArtboard.png'),
(35, 'Championships', 0, 1, 'assets/images/artwork/stockAlbumArtboard.png'),
(36, 'B', 0, 1, 'assets/images/artwork/stockAlbumArtboard.png'),
(37, 'D', 0, 1, 'assets/images/artwork/stockAlbumArtboard.png'),
(38, 'Keenan with A K', 0, 1, 'assets/images/artwork/stockAlbumArtboard.png'),
(39, 'On The run', 0, 1, 'assets/images/artwork/stockAlbumArtboard.png'),
(40, 'Dummy Boy', 0, 1, 'assets/images/artwork/stockAlbumArtboard.png'),
(41, 'StaySafeMoveSmart', 0, 1, 'assets/images/artwork/stockAlbumArtboard.png');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists`
(
  `id` int
(11) NOT NULL,
  `artistName` varchar
(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`
id`,
`artistName
`) VALUES
(40, 'EverythingGwaluh'),
(41, 'AYE1'),
(42, 'Say Unkle'),
(43, 'Baybface Toure'),
(44, 'Quay 80'),
(45, 'Meek Mill'),
(46, 'AYE 1'),
(47, 'Everything Gwaluh'),
(48, 'Tuna'),
(49, 'Young Nudy'),
(50, 'Drake'),
(51, '6ix9ine'),
(52, 'Young Thug'),
(53, 'B'),
(54, 'Blood Orange'),
(55, 'Southside Smoke'),
(56, 'Nicki Minaj'),
(57, ''),
(58, 'Bawskee');

-- --------------------------------------------------------

--
-- Table structure for table `engineers`
--

CREATE TABLE `engineers`
(
  `id` int
(11) NOT NULL,
  `engineerName` varchar
(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `engineers`
--

INSERT INTO `engineers` (`
id`,
`engineerName
`) VALUES
(5, 'BaybfaceToure'),
(6, ''),
(7, 'Baybface Toure'),
(8, 'NULL'),
(9, 'Noah\"40\" Shebib'),
(10, 'Mike Dean'),
(11, 'The Count'),
(12, 'Noah \"40\" Shebib'),
(13, 'Noah'),
(14, 'Alex Tumay');

-- --------------------------------------------------------

--
-- Table structure for table `featuredArtists`
--

CREATE TABLE `featuredArtists`
(
  `id` int
(11) NOT NULL,
  `featuredArtistName` varchar
(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `featuredArtists`
--

INSERT INTO `featuredArtists` (`
id`,
`featuredArtistName
`) VALUES
(2, 'AYE1'),
(3, ''),
(4, 'Tiva'),
(5, 'Faboulous'),
(6, 'NULL'),
(7, 'F.T.F. James'),
(8, 'Kanye West, Nicki Minaj'),
(9, 'Offset'),
(10, '6lack'),
(11, 'Rick Ross, Jay-Z'),
(12, 'Drake, Lil Wayne'),
(13, 'ELMO'),
(14, 'Young Thug'),
(15, 'AYE 1');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres`
(
  `id` int
(11) NOT NULL,
  `name` varchar
(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`
id`,
`name
`) VALUES
(1, 'Rap'),
(2, 'Pop'),
(3, 'EDM'),
(4, 'RnB'),
(5, 'Rock'),
(6, 'Country'),
(7, 'Afro-Caribbean'),
(8, 'Jazz'),
(9, 'Folk'),
(10, 'Classical'),
(11, 'TBD');

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists`
(
  `id` int
(11) NOT NULL,
  `name` varchar
(50) NOT NULL,
  `owner` varchar
(50) NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`
id`,
`name
`, `owner`, `dateCreated`) VALUES
(2, 'Playlist2', 'reece-kenney', '2017-08-27 00:00:00'),
(3, 'Running Songs', 'reece-kenney', '2017-08-27 00:00:00'),
(4, 'Classics', 'reece-kenney', '2017-08-27 00:00:00'),
(5, 'Party', 'reece-kenney', '2017-08-27 00:00:00'),
(6, 'This is a test', 'reece-kenney', '2017-12-04 00:00:00'),
(7, 'Bulldozer', 'reece-kenney', '2017-12-04 00:00:00'),
(8, 'newme', 'bryantlaw', '2018-11-12 00:00:00'),
(9, 'idk', 'unKle', '2018-11-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `playlistSongs`
--

CREATE TABLE `playlistSongs`
(
  `id` int
(11) NOT NULL,
  `songId` int
(11) NOT NULL,
  `playlistId` int
(11) NOT NULL,
  `playlistOrder` int
(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlistSongs`
--

INSERT INTO `playlistSongs` (`
id`,
`songId
`, `playlistId`, `playlistOrder`) VALUES
(6, 17, 2, 4),
(8, 16, 5, 0),
(9, 15, 3, 0),
(10, 14, 4, 0),
(11, 17, 3, 1),
(12, 16, 3, 2),
(13, 16, 5, 1),
(14, 14, 3, 3),
(15, 5, 5, 2),
(16, 23, 4, 1),
(17, 6, 2, 5),
(18, 29, 3, 4),
(19, 1, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `producers`
--

CREATE TABLE `producers`
(
  `id` int
(11) NOT NULL,
  `producerName` varchar
(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producers`
--

INSERT INTO `producers` (`
id`,
`producerName
`) VALUES
(4, 'BaybfaceToure'),
(5, ''),
(6, 'Baybface Toure'),
(7, '808 Mafia'),
(8, 'NULL'),
(9, 'Baybface Toure, POP'),
(10, 'Pierre Bourne'),
(11, 'London on Da Track'),
(12, 'Xan Gang'),
(13, 'Nineteen85'),
(14, 'Ms.Frizzle'),
(15, 'Cookie Monster'),
(16, 'iBeatz');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs`
(
  `id` int
(11) NOT NULL,
  `title` varchar
(250) NOT NULL,
  `artist` int
(11) NOT NULL,
  `album` int
(11) NOT NULL,
  `transcription` int
(11) NOT NULL,
  `genre` int
(11) NOT NULL,
  `featuredArtist` int
(11) NOT NULL,
  `producer` int
(11) NOT NULL,
  `writer` int
(11) NOT NULL,
  `engineer` int
(11) NOT NULL,
  `link` varchar
(500) NOT NULL,
  `duration` varchar
(8) NOT NULL,
  `albumOrder` int
(11) NOT NULL,
  `plays` int
(11) NOT NULL,
  `songArtworkPath` varchar
(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`
id`,
`title
`, `artist`, `album`, `transcription`, `genre`, `featuredArtist`, `producer`, `writer`, `engineer`, `link`, `duration`, `albumOrder`, `plays`, `songArtworkPath`) VALUES
(65, 'StaySafe', 40, 0, 14, 1, 15, 6, 19, 7, 'https://soundcloud.com/everythinggwaluh/stay-safe', 'NULL', 0, 2, 'assets/images/artwork/stockAlbumArtboard.png'),
(68, 'brazy mouth', 42, 0, 143, 3, 6, 8, 9, 8, 'https://soundcloud.com/trippie-hippie-2/topanga', 'NULL', 0, 5, 'assets/images/artwork/stockAlbumArtboard.png'),
(69, 'conde nasty', 42, 0, 141, 3, 6, 8, 9, 8, 'https://soundcloud.com/trippie-hippie-2/topanga', 'NULL', 0, 5, 'assets/images/artwork/stockAlbumArtboard.png'),
(70, 'Scene', 43, 11, 19, 5, 3, 5, 6, 6, 'https://soundcloud.com/baybfacetoure', 'NULL', 0, 3, 'assets/images/artwork/stockAlbumArtboard.png'),
(71, 'gothick', 43, 11, 20, 5, 3, 5, 6, 6, 'https://soundcloud.com/baybfacetoure', 'NULL', 0, 5, 'assets/images/artwork/stockAlbumArtboard.png'),
(72, 'addis', 42, 38, 138, 3, 6, 8, 9, 8, 'https://soundcloud.com/trippie-hippie-2/topanga', 'NULL', 0, 1, 'assets/images/artwork/stockAlbumArtboard.png'),
(75, 'Demo', 44, 14, 24, 1, 3, 7, 0, 6, 'https://soundcloud.com/trippie-hippie-2/topanga', 'NULL', 0, 4, 'assets/images/artwork/stockAlbumArtboard.png'),
(76, 'uptown vibes', 45, 15, 25, 11, 0, 5, 6, 6, 'https://soundcloud.com/baybfacetoure', 'NULL', 0, 2, 'assets/images/artwork/stockAlbumArtboard.png'),
(77, 'Oochie Wally', 45, 16, 25, 11, 5, 5, 6, 6, 'https://soundcloud.com/baybfacetoure', 'NULL', 0, 0, 'assets/images/artwork/stockAlbumArtboard.png'),
(78, 'Action Jackson', 46, 0, 144, 1, 6, 8, 9, 8, 'https://soundcloud.com/everythinggwaluh/stay-safe', 'NULL', 0, 7, 'assets/images/artwork/stockAlbumArtboard.png'),
(79, 'oodles and noodles', 45, 0, 114, 1, 6, 8, 9, 8, 'https://soundcloud.com/everythinggwaluh/stay-safe', 'NULL', 0, 2, 'assets/images/artwork/stockAlbumArtboard.png'),
(80, 'Stay Safe', 47, 18, 28, 1, 6, 8, 9, 8, 'https://soundcloud.com/everythinggwaluh/stay-safe', 'NULL', 0, 3, 'assets/images/artwork/stockAlbumArtboard.png'),
(82, 'gimme dat (kitty kat)', 48, 20, 28, 1, 0, 6, 0, 7, 'https://soundcloud.com/baybfacetoure', 'NULL', 0, 4, 'assets/images/artwork/stockAlbumArtboard.png'),
(83, 'The Breakdown', 46, 0, 28, 6, 6, 6, 10, 7, 'https://www.youtube.com/watch?v=e-dGM6oC6yc', 'NULL', 0, 6, 'assets/images/artwork/stockAlbumArtboard.png'),
(84, 'Zone 6', 49, 21, 33, 1, 6, 0, 9, 8, 'https://soundcloud.com/everythinggwaluh/stay-safe', 'NULL', 0, 6, 'assets/images/artwork/stockAlbumArtboard.png'),
(85, 'Gyalchester', 50, 0, 59, 1, 6, 16, 15, 0, 'https://www.youtube.com/watch?v=CeAhTu4r0hM', 'NULL', 0, 16, 'assets/images/artwork/stockAlbumArtboard.png'),
(86, 'WONDO', 51, 40, 140, 1, 6, 8, 9, 8, 'https://soundcloud.com/scumgang6ix9ine/wondo?in=scumgang6ix9ine/sets/dummy-boy', 'NULL', 0, 0, 'assets/images/artwork/stockAlbumArtboard.png'),
(87, 'On The Run', 52, 0, 142, 1, 6, 11, 9, 8, 'https://soundcloud.com/baybfacetoure', 'NULL', 0, 0, 'assets/images/artwork/stockAlbumArtboard.png'),
(88, 'A', 53, 0, 0, 2, 6, 8, 9, 8, 'https://soundcloud.com/baybfacetoure', 'NULL', 0, 5, 'assets/images/artwork/stockAlbumArtboard.png'),
(89, 'B', 53, 0, 129, 3, 14, 11, 17, 14, 'https://soundcloud.com/baybfacetoure', 'NULL', 0, 0, 'assets/images/artwork/stockAlbumArtboard.png'),
(90, 'C', 53, 0, 37, 2, 6, 8, 9, 8, 'https://soundcloud.com/baybfacetoure', 'NULL', 0, 4, 'assets/images/artwork/stockAlbumArtboard.png'),
(96, 'Mama', 51, 23, 39, 3, 6, 8, 9, 8, 'https://soundcloud.com/scumgang6ix9ine/mama?in=scumgang6ix9ine/sets/dummy-boy', 'NULL', 0, 5, 'assets/images/artwork/stockAlbumArtboard.png'),
(97, 'Whats Free', 45, 15, 40, 1, 0, 8, 9, 8, 'https://soundcloud.com/baybfacetoure', 'NULL', 0, 0, 'assets/images/artwork/stockAlbumArtboard.png'),
(98, 'Charcoal Baby', 54, 26, 41, 4, 6, 8, 9, 8, 'https://soundcloud.com/baybfacetoure', 'NULL', 0, 0, 'assets/images/artwork/stockAlbumArtboard.png'),
(99, 'Like Sito', 55, 27, 42, 1, 6, 0, 9, 8, 'NULL', 'NULL', 0, 2, 'assets/images/artwork/stockAlbumArtboard.png'),
(100, 'Truffle Butter', 56, 0, 45, 1, 12, 13, 0, 8, 'NULL', 'NULL', 0, 0, 'assets/images/artwork/stockAlbumArtboard.png'),
(101, '', 57, 29, 28, 0, 3, 5, 6, 6, '', 'NULL', 0, 0, 'assets/images/artwork/stockAlbumArtboard.png'),
(102, 'Bring dat bag out (feat. lil yachty)', 58, 34, 84, 1, 6, 8, 9, 8, 'https://www.youtube.com/watch?v=tkDgsBQ5-Dg', 'NULL', 0, 0, 'assets/images/artwork/stockAlbumArtboard.png');

-- --------------------------------------------------------

--
-- Table structure for table `transcriptions`
--

CREATE TABLE `transcriptions`
(
  `id` int
(11) NOT NULL,
  `lyrics` varchar
(20000) CHARACTER
SET utf8
NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transcriptions`
--

INSERT INTO `transcriptions` (`
id`,
`lyrics
`) VALUES
(14, ' \"Ridin With an AK\"'),
(15, ' \"Heard You tellin\"'),
(16, ' \"take that off you...\"'),
(17, ' but i dont get no rest'),
(18, ' philly chicks on my blicky'),
(19, ' get on your knees'),
(20, ' gotdang shawty gothik'),
(21, ' i said girl why yoy keep calling'),
(22, ' lil bitch you a dub'),
(23, ' \"im a eastside nigga\"'),
(24, ' im a east side nigga'),
(25, ' spanish bih'),
(26, ' spanish bih'),
(27, ' jumpin out the roof'),
(28, ' '),
(29, ' '),
(30, ' '),
(31, ' '),
(32, ' '),
(33, ' East Atlanta'),
(34, 'hermes link, Ice Blue mink\r\ntat on my ribs, like i do not know what permanent is'),
(35, ' '),
(36, ' all day all day all day all day all day all day all day all day\r\n all day all day all day all day all day all day all day all day\r\n\r\n all day all day all day all day all day all day all day all day\r\n\r\ns\r\n all day all day all day all day all day all day all day all day\r\nss\r\n'),
(37, ' !@#$%^&*()[]'),
(39, ' Intro 6ix9ine & Baka\r\nUh\r\nMurda on the beat so it\'s not nice!\r\n\r\nChorus 6ix9ine\r\nTiki Taki, Spanish mami, she a hot tamale
(Hot)\r\nMake her spend that money, dummy, go
retarded
for me
(Pop it)\r\nPop it, pop it, she get started, she won\'t ever stop it\r\nLittle thottie, got her rowdy, choosin\' everybody\r\n\r\nVerse 1 6ix9ine\r\nSplish, splash, Apple Bottoms make that ass fat\r\nShe got that wet wet, got me blowin\' through this whole bag Rack\r\nShe got B\'s, spend some cheese, now they double D\'s\r\nThought I had to free, kick her out, my mama comin\' home at three\r\nHo thicker-thicker-thicker than a fuckin\' Snicker\r\nDrug dealer, professional pot-whipper\r\nIn the winter, buy your ho a chinchilla Grrr\r\nI just bought my bitch them Kylie Jenner lip fillers\r\n\r\nBridge Kanye West\r\nMan, oh my God\r\nShe Instagram famous but she can\'t keep a job Ooh\r\nMan, oh my God\r\nSwipe her 30-inch weave on her sugar daddy card Ooh\r\nMan, oh my God\r\nHer doctor got her bustin\' out her motherfuckin\' bra Mmm\r\nMan, oh my God\r\nShe Uber to a nigga
with no car\r\n\r\nVerse 2 Kanye West\r\nTalkin\' \'bout the relish, I do not embellish\r\nJacket got wings, True\'s got propellers\r\nGave all my old Margielas to my boy Marcellus\r\nPulled up with no laces, had the whole block jealous\r\nOh, Jesus Christ, I don\'t need advice\r\nWild nigga life, tell \'em read my rights\r\nMan it hot tonight, lucky I wore my ice\r\n15 in the game, baby girl, I got stripes Huuh\r\n\r\nRefrain Nicki Minaj\r\nKa-Ka-Kanye dressed me up like a doll\r\nThen I hit 6ix9ine, tell him give me the ball\r\nBitch, this the dream team, magic as I recall\r\nWhole squad on point, bunch of Chris Pauls (Chris Pauls)\r\n\r\nVerse 3 Nicki Minaj\r\nI was out in Spain rockin\' a Medusa head\r\nI ain\'t never have to give a rap producer head\r\nIf I do, though, I\'ma write a book like Supahead\r\nThis ain\'t wonder that I\'m makin\', this that super bread\r\nSplish, splash, fuck him in a hurry, quick, fast\r\nStill a pink wig, thick ass, whiplash\r\nGot him cummin\', cummin\', Roger, over, dispatch\r\nSaid my box is the best, he met his match\r\nI got all these bitches wantin\' to be Barbie dolls\r\nBarbie Dreamhouse, pink and purple marble walls\r\nPull-Pull up in that Barbie \'Rari, finna bury y\'all\r\nShe threw dirt on my name, ended up at her own burial\r\n\r\nRefrain Nicki Minaj\r\nKanye dressed me up like a doll\r\nThen I hit 6ix9ine, tell him give me the ball\r\nBitch, this the dream team, magic as I recall\r\nWhole squad on point, bunch of Chris Pauls\r\nKa-Ka-Kanye dressed me up like a doll\r\nThen I hit 6ix9ine, tell him give me the ball\r\nBitch, this the dream team, Fif\' is on call\r\nWhole squad on point, bunch of Chris Pauls Chris Pauls\r\n\r\nChorus 6ix9ine\r\nTiki Taki, Spanish mami, she a hot tamale Hot\r\nMake her spend that money, dummy, go retarded for me Pop it\r\nPop it, pop it, she get started, she won\'t ever stop it\r\nLittle thottie, got her rowdy, choosing everybody'),
(40, ' [Intro: Meek Mill]\r\nYou know what free is, nigga?\r\n\r\n[Chorus: Meek Mill]\r\nWhat\'s free?\r\nFree is when nobody else could tell us what to be\r\nFree is when the TV ain\'t controllin\' what we see\r\nTold my niggas, \"I need you\"\r\nThrough all the fame, you know I stayed true\r\nPray my niggas stay free\r\nMade a few mistakes but this ain\'t where I wanna be\r\nBefore I\'m judged by 12, put a 12 on my V\r\nTold my niggas, \"I need you\"\r\nStay up, I know these times ain\'t true\r\nReal life, what\'s free?\r\n\r\n[Verse 1: Rick Ross]\r\nSince a lad, I was cunning, just got a pad out in London\r\nI keep stackin\' my money, I\'ll need a ladder by summer\r\nAK shots, niggas duckin\' stray shots\r\nBeen a top dog, that\'s before the K-Dots\r\nCrackin\' in \'06, immaculate showmanship\r\nTalkin\' like you Mitch, disastrous on the strip\r\nHoldin\' on your bitch, coulda never sold you a brick\r\nWith them people, you never been on a list\r\nMona Lisa to me ain\'t nothin\' but a bitch\r\nHangin\' pictures like niggas swingin\' from his dick\r\nWe so different, you thought these didn\'t exist\r\nThe Megalodon never seen on his wrist\r\nI\'m from the South where they never make it this rich\r\nGod is the greatest, but Satan been on his shit\r\nWalkin\' the pavement, I pray I\'m illuminated\r\nOver a decade and never nobody\'s favorite\r\nPot and kilo go
hand
in hand like we Gamble and Huff\r\nMy amigo, a million grams and we count \'em and up\r\nYou was dead broke, I let you hold a pack\r\nYou paid for it, but I fucked around and stole the track\r\nScreaming \"gang gang,\" now you wanna rat\r\nRacketeering charges caught him on a tap\r\nLookin\' for a bond, lawyers wanna tax\r\nPurple hair got them faggots on your back\r\n\r\n[Chorus: Meek Mill]\r\nWhat\'s free?\r\nFree is when nobody else could tell us what to be\r\nFree is when the TV ain\'t controllin\' what we see\r\nTold my niggas, \"I need you\"\r\nThrough all the fame, you know I stayed true\r\nPray my niggas stay free\r\nMade a few mistakes but this ain\'t where I wanna be\r\nBefore I\'m judged by 12, put a 12 on my V\r\nTold my niggas, \"I need you\"\r\nStay up, I know these times ain\'t true\r\nReal life, what\'s free? (Yeah)\r\n\r\n[Verse 2: Meek Mill]\r\nFed investigations, heard they plottin\' like I trap\r\n20 mill\' in cash, they know I got that off of rap\r\nMaybe it\'s the Michael Rubins or the Robert Krafts\r\nOr the billionaire from Marcy, and the way they got my back, uh\r\nSee how I prevailed now they try to knock me back, uh\r\nLocked me in a cell for all them nights and I won\'t snap, uh\r\nTwo-fifty a show and they still think I\'m sellin\' crack, uh\r\nWhen you bring my name up to the judge, just tell him facts\r\nTell him how we fundin\' all these kids to go
to college
\r\nTell him how we ceasin\' all these wars, stoppin\' violence\r\nTryna fix the system and the way that they designed it\r\nI think they want me silenced
(Shush)\r\nOh, say can you see, I don\'t feel like I\'m free\r\nLocked down in my cell, shackled from ankle to feet\r\nJudge bangin\' that gavel, turned me to slave from a king\r\nAnother day in the bing, I gotta hang from a string\r\nJust for poppin\' a wheelie, my people march through the city\r\nFrom a cell to a chopper, view from the top of the city\r\nYou can tell how we rockin\', soon as I pop up we litty\r\nPoppin\' like Bad Boy in \'94, Big Poppa and Diddy\r\nAnd niggas counted me out like my accountant ain\'t busy\r\nThat\'s five milli\' in twenties, sit up and count \'til I\'m dizzy\r\nPhantom 500 thousand, hundred round in a stizzy\r\nIs we beefin\' or rappin\'? I might just pop up
with Drizzy like\r\n\r\n[Chorus: Meek Mill]\r\nWhat\'s free?\r\nFree is when nobody else could tell us what to be\r\nFree is when the TV ain\'t controllin\' what we see\r\nTold my niggas, \"I need you\"\r\nThrough all the fame, you know I stayed true\r\nPray my niggas stay free\r\nMade a few mistakes but this ain\'t where I wanna be\r\nBefore I\'m judged by 12, put a 12 on my V\r\nTold my niggas, \"I need you\"\r\nStay up, I know these times ain\'t true\r\nReal life, what\'s free?\r\n\r\n[Verse 3: JAY-Z]\r\nIn the land of the free, where the blacks enslaved\r\nThree-fifths of a man, I believe\'s the phrase\r\nI\'m 50% of D\'usse and it\'s debt free (Yeah)\r\n100% of Ace of Spades, worth half a B (Uh)\r\nRoc Nation, half of that, that\'s my piece\r\nHunnid percent of Tidal to bust it up
with my Gs, uh\r\nSince most of my niggas won\'t ever work together\r\nYou run a check up but they never give you leverage\r\nNo red hat, don\'t Michael and Prince me and Ye\r\nThey separate you when you got Michael and Prince\'s DNA, uh\r\nI ain\'t one of these house niggas you bought\r\nMy house like a resort, my house bigger than yours\r\nMy spou-
(C\'mon, man)\r\nMy route better, of course\r\nWe started without food in our mouth\r\nThey gave us pork and pig intestines\r\nShit you discarded that we ingested, we made the project a wave\r\nYou came back, reinvested and gentrified it\r\nTook niggas\' sense of pride, now how that\'s free?\r\nAnd them people stole the soul and hit niggas with 360s, huh\r\nI ain\'t got a billion streams, got a billion dollars\r\nInflating numbers like we \'posed to be happy about this\r\nWe was praisin\' Billboard, but we were young\r\nNow I look at Billboard like, \"Is you dumb?\"\r\nTo this day, Grandma \'fraid what I might say\r\nThey gon\' have to
kill me, Grandmama, I\'m not they slave\r\nHa-ha-ha-ha-ha, check out the bizarre\r\nRappin\' style used by me, the H-O-V\r\nLook at my hair free, carefree, niggas ain\'t ne\'er free\r\nEnjoy your chains, what\'s your employer name with the hairpiece?\r\nI survived the hood, can\'t no Shaytan rob me\r\nMy accountant\'s so good, I\'m practically livin\' tax free\r\nFactory, that\'s me\r\nSold drugs, got away scot-free\r\nThat\'s a CC, E-copy\r\nGuilt free, still me\r\nAnd expect me to not feel a way to this day\r\nYou would say y\'all killed me\r\nSucker free, no shuckin\' me, I don\'t jive turkey\r\nSay \"Happy Thanksgiving,\" shit sound like a murder to me\r\nSmoke free, all of y\'all callin\' out toll free\r\nLabel rob you for millions yet you wanna put a hole in me\r\nSugar free, seasoned but I\'m salt free\r\nYou lay a hand on Hov, my shooter shoot for free\r\nI promise World War Three\r\nSend a order through a hands free\r\nKill you in 24 hours or shorter, you can\'t ignore the hand speed\r\nOn god, it\'s off the head, this improv but it\'s no comedy\r\nSign I fail? Hell nah\r\n
(Ha-ha-ha-ha-ha) Hahahahahahahahaha'),
(41, ' [Verse]\r\nWhen you wake up\r\nIt\'s not the first thing that you wanna know\r\nCan you still count\r\nAll of the reasons that you\'re not alone?\r\nWhen you wake up\r\nIt\'s not the first thing that you wanna know\r\nCan you still count\r\nAll of the reasons that you\'re not alone?\r\n\r\n[Chorus]\r\nNo one wants to be the odd one out at times\r\nNo one wants to be the negro swan\r\nCan you
break
sometimes?\r\nCan you
break
sometimes?
(sometimes, ooh)\r\nCharcoal make it start and make me liked at times\r\nLick me till it cleans all of the world\r\nCan you
break
sometimes?\r\nCan you
break
sometimes?
(sometimes)\r\n\r\n[Verse]\r\nWhen you wake up\r\nIt\'s not the first thing that you wanna know\r\nCan you still count\r\nAll of the reasons that you\'re not alone?\r\n\r\n[Chorus]\r\nNo one wants to be the odd one out at times\r\nNo one wants to be the negro swan\r\nCan you
break
sometimes?
(sometimes)\r\nCan you
break
sometimes?
(sometimes, oh)\r\nCharcoal make it start and make me liked at times\r\nLick me till it cleans all of the world\r\nCan you
break
sometimes?
(sometimes)\r\nCan you
break
sometimes?
(sometimes)\r\n\r\n[Interlude]\r\nCan you
break
sometimes?\r\nNo one, no one\r\nCan she
break
sometimes?\r\nNo one, no one\r\nCan you
break
sometimes?\r\nNo one, no one\r\nCan she
break
sometimes?\r\nNo one, no, no one\r\n\r\n[Outro]\r\nCan you
break
sometimes?\r\nCan you
break
sometimes?\r\nCan you
break
sometimes?\r\nCan you
break
sometimes?'),
(42, ' mi vida brazy like sito'),
(43, ' [Verse 1: Drake]\r\nUh, thinkin\' out loud\r\nI must have a quarter million on me right now\r\nHard to make a song \'bout somethin\' other than the money\r\nTwo things I\'m about is talkin\' blunt and staying blunted\r\nPretty women, are you here? Are you here right now, huh?\r\nWe should all disappear right now\r\nLook, you\'re gettin\' all your friends and you\'re gettin\' in the car\r\nAnd you\'re comin\' to the house, are we clear right now, huh?\r\nYou see the fleet of all the new things\r\nCop cars with the loose change\r\nAll white like I move things\r\nNiggas see me rollin\' and they mood change\r\nLike a muhfucka\r\nNew flow, I got a dozen of \'em\r\nI don\'t trust you, you a undercover\r\nI could probably make some step-sisters fuck each other
(woo)\r\nTalkin\' filets with the truffle butter\r\nFresh sheets and towels, man she gotta love it\r\nYeah, they all get what they desire from it\r\nWhat, tell them niggas we ain\'t hidin\' from it\r\n\r\n[Verse 2: Nicki Minaj]\r\nYo, thinkin\' out loud\r\nI must have about a milli on me right now\r\nAnd I ain\'t talkin\' about that Lil Wayne record\r\nI\'m still the highest sellin\' female rapper, for the record\r\nMan, this a 65 million single sold\r\nI ain\'t gotta compete with a single soul\r\nI\'m good
with the ballpoint game, finger roll\r\nAsk me how to do it, I don\'t tell a single soul\r\nPretty women, wassup? Is you here right now?\r\nYou a stand-up or is you in your chair right now?\r\nUhh, do you hear me? I can\'t let a wack nigga get near me\r\nI might kiss the baddest bitch
if you dare me\r\nI ain\'t never need a man to take care of me\r\nYo, I\'m in that big boy, bitches can\'t rent this\r\nI floss everyday, but I ain\'t a dentist\r\nYour whole style and approach, I invented\r\nAnd I ain\'t takin\' that back, cause I meant it\r\n\r\n[Verse 3: Lil Wayne]\r\nUh, thinkin\' out loud\r\nI could be broke and keep a million dollar smile\r\nLOL to the bank, check in my account\r\nBank teller flirtin\' after checkin\' my account\r\nPretty ladies, are you here?\r\nTruffle butter on your pussy\r\nCuddle buddies on the low\r\nYou ain\'t gotta tell your friend\r\nThat I eat it in the morning\r\nCause she gonna say \"I know\"\r\nCan I hit it in the bathroom?\r\nPut your hands on the toilet\r\nI\'ll put one leg on the tub\r\nGirl, this my new dance move\r\nI just don\'t know what to call it\r\nBut bitch you dancing
with the stars\r\nI ain\'t nothin\' like your last dude\r\nWhat\'s his name? â€” Not important\r\nI brought some cocaine if you snortin\'\r\nShe became a vacuum\r\nPut it on my dick like carpet\r\nSuck the white off white chocolate\r\nI\'m so heartless, thoughtless\r\nLawless, and flawless\r\nSmallest, regardless\r\nLargest in charge\r\nAnd born in New Orleans\r\nGet killed for Jordans\r\nSkateboard, I\'m gnarly\r\nDrake, Tunechi, and Barbie\r\nYou know!\r\n\r\n[Produced by Nineteen85]'),
(44, ''),
(45, ' thinkin Out Loud'),
(46, 'NULL'),
(47, ' ABCDEFG'),
(48, ' ABCDEFG'),
(49, ' '),
(50, 'NULL'),
(51, ' hermes link, Ice Blue mink tat on my ribs, like i do not know what permanent is they want me gone , they for the kicker'),
(52, ' hermes link, Ice Blue mink tat on my ribs, like i do not know what permanent is they want me gone , they for the kicker'),
(53, 'NULL'),
(54, 'NULL'),
(55, 'NULL'),
(56, 'NULL'),
(57, ' [Chorus]\r\nHermÃ¨s link, ice-blue mink\r\nTat on my ribs like I do not know what permanent is\r\nThey want me gone, wait for the kicker\r\nBury me now and I only get bigger\r\nThat\'s word to my nigga\r\n\r\n[Verse 1]\r\nYeah, October Firm in the cut\r\nStay at the top like I\'m stuck\r\nThat\'s just how I\'m givin\' it up\r\nShe wanna get married tonight\r\nBut I can\'t take a knee, \'cause I\'m wearin\' all white\r\nMe and my broski are twins, but we don\'t look alike\r\nI don\'t take naps\r\nMe and the money are way too attached to go and do that\r\nMuscle relax\r\nThat and the spliff put me right on my back, I gotta unpack\r\nVirginia Black\r\nI could go make enough money off that and not even rap\r\nWhat\'s that? Facts?\r\nContract max, I gotta bring that shit back\r\n\r\n[Chorus]\r\nHermÃ¨s link, ice-blue mink\r\nTat on my ribs like I do not know what permanent is\r\nThey want me gone, out of the picture\r\nBury me now and I only get bigger\r\nThat\'s word to my, word to myâ€”\r\n\r\n[Verse 2]\r\nI\'m so hot, yeah, Iâ€™m so right now\r\nWho\'s not gang, bitch? Let me find out\r\nKeep hearin\' clicks when I\'m talkin\' on the iPhone\r\nFeds in the city hate to see us on a high note\r\nI switch flow like I switch time zone\r\nCan\'t get Nobu, but you can get Milestone\r\nI gotta do mansion \'cause I outgrew condo\r\nGotta do Maybach, she wanna fuck on the drive home\r\nYeah, met her once and I got through\r\nI\'m never washed, but I\'m not new\r\nI know I said top five, but I\'m top two\r\nAnd I\'m not two and I got one\r\nThought you had one, but it\'s not one, nigga, nah\r\n\r\n[Chorus]\r\nHermÃ¨s link, ice-blue mink\r\nTat on my ribs like I do not know what permanent is\r\nThey want me gone, wait for the kicker\r\nBury me now and I only get bigger\r\nThat\'s word to my nigga'),
(58, 'NULL'),
(59, ' [Chorus] HermÃ¨s link, ice-blue mink Tat on my ribs like I do not know what permanent is They want me gone, wait for the kicker Bury me now and I only get bigger That\'s word to my nigga [Verse 1] Yeah, October Firm in the cut Stay at the top like I\'m stuck That\'s just how I\'m givin\' it up She wanna get married tonight But I can\'t take a knee, \'cause I\'m wearin\' all white Me and my broski are twins, but we don\'t look alike I don\'t take naps Me and the money are way too attached to go and do that Muscle relax That and the spliff put me right on my back, I gotta unpack Virginia Black I could go make enough money off that and not even rap What\'s that? Facts? Contract max, I gotta bring that shit back [Chorus] HermÃ¨s link, ice-blue mink Tat on my ribs like I do not know what permanent is They want me gone, out of the picture Bury me now and I only get bigger That\'s word to my, word to myâ€” [Verse 2] I\'m so hot, yeah, Iâ€™m so right now Who\'s not gang, bitch? Let me find out Keep hearin\' clicks when I\'m talkin\' on the iPhone Feds in the city hate to see us on a high note I switch flow like I switch time zone Can\'t get Nobu, but you can get Milestone I gotta do mansion \'cause I outgrew condo Gotta do Maybach, she wanna fuck on the drive home Yeah, met her once and I got through I\'m never washed, but I\'m not new I know I said top five, but I\'m top two And I\'m not two and I got one Thought you had one, but it\'s not one, nigga, nah [Chorus] HermÃ¨s link, ice-blue mink Tat on my ribs like I do not know what permanent is They want me gone, wait for the kicker Bury me now and I only get bigger That\'s word to my nigga'),
(60, 'NULL'),
(61, ' [Chorus] HermÃ¨s link, ice-blue mink Tat on my ribs like I do not know what permanent is They want me gone, wait for the kicker Bury me now and I only get bigger That\'s word to my nigga [Verse 1] Yeah, October Firm in the cut Stay at the top like I\'m stuck That\'s just how I\'m givin\' it up She wanna get married tonight But I can\'t take a knee, \'cause I\'m wearin\' all white Me and my broski are twins, but we don\'t look alike I don\'t take naps Me and the money are way too attached to go and do that Muscle relax That and the spliff put me right on my back, I gotta unpack Virginia Black I could go make enough money off that and not even rap What\'s that? Facts? Contract max, I gotta bring that shit back [Chorus] HermÃ¨s link, ice-blue mink Tat on my ribs like I do not know what permanent is They want me gone, out of the picture Bury me now and I only get bigger That\'s word to my, word to myâ€” [Verse 2] I\'m so hot, yeah, Iâ€™m so right now Who\'s not gang, bitch? Let me find out Keep hearin\' clicks when I\'m talkin\' on the iPhone Feds in the city hate to see us on a high note I switch flow like I switch time zone Can\'t get Nobu, but you can get Milestone I gotta do mansion \'cause I outgrew condo Gotta do Maybach, she wanna fuck on the drive home Yeah, met her once and I got through I\'m never washed, but I\'m not new I know I said top five, but I\'m top two And I\'m not two and I got one Thought you had one, but it\'s not one, nigga, nah [Chorus] HermÃ¨s link, ice-blue mink Tat on my ribs like I do not know what permanent is They want me gone, wait for the kicker Bury me now and I only get bigger That\'s word to my nigga'),
(62, 'NULL'),
(63, 'NULL'),
(64, 'NULL'),
(65, 'NULL'),
(66, 'NULL'),
(67, 'NULL'),
(68, 'NULL'),
(69, 'NULL'),
(70, 'NULL'),
(71, 'NULL'),
(72, 'NULL'),
(73, 'NULL'),
(74, 'NULL'),
(75, 'NULL'),
(76, 'NULL'),
(77, 'NULL'),
(78, 'NULL'),
(79, 'NULL'),
(80, 'NULL'),
(81, 'NULL'),
(82, 'NULL'),
(83, 'NULL'),
(84, ' uh, uh\r\nstack up, stack up\r\nstick make a nigga back up
(Yeah)\r\nSK, AK, shit lookin\' like a racker (Ya)'),
(85, 'NULL'),
(86, 'NULL'),
(87, 'NULL'),
(88, 'NULL'),
(89, 'NULL'),
(90, 'NULL'),
(91, 'NULL'),
(92, 'NULL'),
(93, 'NULL'),
(94, 'NULL'),
(95, 'NULL'),
(96, 'NULL'),
(97, 'NULL'),
(98, 'NULL'),
(99, 'NULL'),
(100, 'NULL'),
(101, 'NULL'),
(102, 'NULL'),
(103, 'NULL'),
(104, 'NULL'),
(105, 'NULL'),
(106, 'NULL'),
(107, 'NULL'),
(108, 'NULL'),
(109, 'NULL'),
(110, 'NULL'),
(111, 'NULL'),
(112, 'NULL'),
(113, 'NULL'),
(114, ' oodles and noodles babies'),
(115, 'NULL'),
(116, ' oodles and noodles babies'),
(117, 'NULL'),
(118, 'NULL'),
(119, 'NULL'),
(120, 'NULL'),
(121, 'NULL'),
(122, 'NULL'),
(123, 'NULL'),
(124, 'NULL'),
(125, 'NULL'),
(126, 'NULL'),
(127, ' Barter 6'),
(128, ' '),
(129, ' Barter 6 Slaaat!'),
(130, ' Barter 6 Slaaat!'),
(131, ' Barter 6 Slaaat!'),
(132, ' Barter 6 Slaaat!'),
(133, ' Barter 6 Slaaat!'),
(134, ' Barter 6 Slaaat!'),
(135, ' Barter 6 Slaaat!'),
(136, ' Barter 6 Slaaat!'),
(137, ' Thinkin Out Loud'),
(138, ' i aint with the fake shit'),
(139, ' '),
(140, 'Treyyyyyyway'),
(141, ' resignin in december'),
(142, ' im on the run bih, here i come'),
(143, ' brazy'),
(144, ' jumpin out the roof, what it do'),
(145, ' \"Ridin With an AK\"'),
(146, ' \"Ridin With an AK\"');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users`
(
  `id` int
(11) NOT NULL,
  `username` varchar
(25) NOT NULL,
  `firstName` varchar
(50) NOT NULL,
  `lastName` varchar
(50) NOT NULL,
  `email` varchar
(200) NOT NULL,
  `password` varchar
(32) NOT NULL,
  `signUpDate` datetime NOT NULL,
  `profilePic` varchar
(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`
id`,
`username
`, `firstName`, `lastName`, `email`, `password`, `signUpDate`, `profilePic`) VALUES
(1, 'BryantLaw', 'Bryant', 'Law', 'Pre7j@pachilly.com', '3173a034c91e9ce68edebae4a3e87357', '2018-10-27 00:00:00', 'assets/images/profile-pics/head_emerald.png'),
(2, 'neo', 'The', 'One', '', 'c4ca4238a0b923820dcc509a6f75849b', '0000-00-00 00:00:00', ''),
(3, 'unKle', 'Flee', 'Cave', 'Keenan.alves@gmail.com', '7c4909de4ac827a407108008fcc7ece0', '2018-11-30 00:00:00', 'assets/images/profile-pics/head_emerald.png'),
(4, 'Guest', 'Guest', 'Account', '', 'adb831a7fdd83dd1e2a309ce7591dff8', '0000-00-00 00:00:00', 'assets/images/profile-pics/head_emerald.png');

-- --------------------------------------------------------

--
-- Table structure for table `writers`
--

CREATE TABLE `writers`
(
  `id` int
(11) NOT NULL,
  `writerName` varchar
(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `writers`
--

INSERT INTO `writers` (`
id`,
`writerName
`) VALUES
(5, 'EverythingGwaluh'),
(6, ''),
(7, 'Baybface Toure'),
(8, 'Quay 80'),
(9, 'NULL'),
(10, 'AYE 1'),
(11, 'Tuna'),
(12, 'Onika Minaj'),
(13, 'SLIMESITO'),
(14, 'Big Bird'),
(15, 'Aubrey Graham'),
(16, 'Jeffery'),
(17, 'Quentin Miller'),
(18, 'Onika Minaj, Aubrey Graham & Dwayne Carter'),
(19, 'Everything Gwaluh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `engineers`
--
ALTER TABLE `engineers`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `featuredArtists`
--
ALTER TABLE `featuredArtists`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `playlistSongs`
--
ALTER TABLE `playlistSongs`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `producers`
--
ALTER TABLE `producers`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `transcriptions`
--
ALTER TABLE `transcriptions`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `writers`
--
ALTER TABLE `writers`
ADD PRIMARY KEY
(`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `engineers`
--
ALTER TABLE `engineers`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `featuredArtists`
--
ALTER TABLE `featuredArtists`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `playlistSongs`
--
ALTER TABLE `playlistSongs`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `producers`
--
ALTER TABLE `producers`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `transcriptions`
--
ALTER TABLE `transcriptions`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `writers`
--
ALTER TABLE `writers`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
