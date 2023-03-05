-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2021 at 06:59 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_addon`
--

CREATE TABLE `tbl_addon` (
  `id` int(11) NOT NULL,
  `addon_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_addon`
--

INSERT INTO `tbl_addon` (`id`, `addon_name`) VALUES
(1, 'Size'),
(2, 'Kiểu đế'),
(3, 'Loại Pasta');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_addon_category`
--

CREATE TABLE `tbl_addon_category` (
  `addon_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_addon_category`
--

INSERT INTO `tbl_addon_category` (`addon_id`, `category_id`) VALUES
(1, 2),
(1, 3),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_addon_values`
--

CREATE TABLE `tbl_addon_values` (
  `id` int(11) NOT NULL,
  `addon_val` varchar(20) DEFAULT NULL,
  `addon_price` int(11) DEFAULT NULL,
  `addon_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_addon_values`
--

INSERT INTO `tbl_addon_values` (`id`, `addon_val`, `addon_price`, `addon_id`) VALUES
(1, 'Lớn', 80000, 1),
(2, 'Vừa', 50000, 1),
(3, 'Nhỏ', 0, 1),
(4, 'Kiểu American', 0, 2),
(5, 'Kiểu Italian', 0, 2),
(6, 'Kiểu Farfalle', 0, 3),
(7, 'Kiểu Penne', 0, 3),
(8, 'Kiểu Spaghetti', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` varchar(10) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `pwd` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `user_type_id`, `pwd`) VALUES
('20010807', 1, '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(15) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category_name`, `image`) VALUES
(2, 'Pizza', 'https://cdn-icons-png.flaticon.com/512/1384/1384676.png'),
(3, 'Pasta', 'https://cdn-icons-png.flaticon.com/512/4727/4727368.png'),
(4, 'Salad', 'https://cdn-icons-png.flaticon.com/512/590/590808.png'),
(5, 'Drink', 'https://cdn-icons-png.flaticon.com/512/2738/2738730.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `street_address` varchar(100) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pwd` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `user_type_id`, `first_name`, `last_name`, `country`, `street_address`, `city`, `phone`, `email`, `pwd`) VALUES
(1, 2, 'minh', 'nguyen', 'VietNam', 'Nam Dong', 'Ha Noi', '0967105498', 'minhphm37@gmail.com', '$2y$10$a596T4xm3CyhJzrNnhZC6O1YDZrpxpwhfV3rPJGXbUg0e7sPyq0Oy'),
(2, 3, 'thanh', 'nguyen', 'VietNam', 'thanh xuan', 'ha noi', '0967105498', 'thanh@gnail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ingredient`
--

CREATE TABLE `tbl_ingredient` (
  `id` int(11) NOT NULL,
  `ingredient_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ingredient_material`
--

CREATE TABLE `tbl_ingredient_material` (
  `ingredient_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `gram` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_material`
--

CREATE TABLE `tbl_material` (
  `id` int(11) NOT NULL,
  `material_name` varchar(20) DEFAULT NULL,
  `kilogram` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `date_post` date DEFAULT NULL,
  `content` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `image`, `title`, `date_post`, `content`) VALUES
(2, 'http://pizzahouse.themerex.net/wp-content/uploads/2016/08/image-1-1170x659.jpg', 'The Food Lab: How to Make the Best Kale Pizza', '2021-12-19', 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?\r\n\r\nQuis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati cupiditate non provident, similique sunt in culpa, qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.\r\n\r\nNam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime placeat, facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet, ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(4, 'http://pizzahouse.themerex.net/wp-content/uploads/2016/08/image_2-1170x659.jpg', 'Like Mushroom Pizza?', '2021-12-20', 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?\r\n\r\nQuis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati cupiditate non provident, similique sunt in culpa, qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.\r\n\r\nNam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime placeat, facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet, ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(5, 'http://pizzahouse.themerex.net/wp-content/uploads/2016/08/image-3.jpg', 'Pizza Poll: How Do You Like Your Sausage?', '2021-12-20', 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime placeat, facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet, ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.'),
(6, 'http://pizzahouse.themerex.net/wp-content/uploads/2016/08/image-4-1170x659.jpg', 'Nam libero tempore, cum soluta nobis', '2021-12-20', 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?\r\n\r\nQuis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati cupiditate non provident, similique sunt in culpa, qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.\r\n\r\nNam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime placeat, facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet, ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` varchar(30) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` date DEFAULT NULL,
  `order_state_id` int(11) NOT NULL,
  `addition_option` longtext DEFAULT NULL,
  `payment_method_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `customer_id`, `order_date`, `order_state_id`, `addition_option`, `payment_method_id`) VALUES
('20211220143240', 1, '2021-12-20', 1, 'nope', 2),
('20211222191632', 2, '2021-12-22', 1, 'nope', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_item_group`
--

CREATE TABLE `tbl_order_item_group` (
  `id` int(11) NOT NULL,
  `cart_order_num` int(11) DEFAULT NULL,
  `order_id` varchar(30) NOT NULL,
  `order_qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order_item_group`
--

INSERT INTO `tbl_order_item_group` (`id`, `cart_order_num`, `order_id`, `order_qty`) VALUES
(6, 0, '20211220143240', 6),
(7, 0, '20211222191632', 2),
(8, 1, '20211222191632', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_item_option`
--

CREATE TABLE `tbl_order_item_option` (
  `product_id` int(11) NOT NULL,
  `order_id` varchar(30) NOT NULL,
  `addon_value_id` int(11) NOT NULL,
  `cart_order_num_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order_item_option`
--

INSERT INTO `tbl_order_item_option` (`product_id`, `order_id`, `addon_value_id`, `cart_order_num_id`) VALUES
(1, '20211222191632', 2, 8),
(1, '20211222191632', 4, 8),
(6, '20211220143240', 1, 6),
(6, '20211220143240', 4, 6),
(8, '20211222191632', 2, 7),
(8, '20211222191632', 4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_payment`
--

CREATE TABLE `tbl_order_payment` (
  `id` int(11) NOT NULL,
  `order_id` varchar(30) NOT NULL,
  `vnp_response_code` varchar(255) DEFAULT NULL,
  `code_vnpay` varchar(255) DEFAULT NULL,
  `code_bank` varchar(15) DEFAULT NULL,
  `time_pay` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order_payment`
--

INSERT INTO `tbl_order_payment` (`id`, `order_id`, `vnp_response_code`, `code_vnpay`, `code_bank`, `time_pay`) VALUES
(2, '20211220143240', '00', '13657445', 'NCB', '2021-12-20 20:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_state`
--

CREATE TABLE `tbl_order_state` (
  `id` int(11) NOT NULL,
  `state` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order_state`
--

INSERT INTO `tbl_order_state` (`id`, `state`) VALUES
(1, 'Chờ tiếp nhận'),
(2, 'Đã tiếp nhận'),
(3, 'Đã thu hồi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_method`
--

CREATE TABLE `tbl_payment_method` (
  `id` int(11) NOT NULL,
  `payment_method` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payment_method`
--

INSERT INTO `tbl_payment_method` (`id`, `payment_method`) VALUES
(1, 'Thanh toán sau nhận hàng'),
(2, 'Thanh toán Online');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` longtext DEFAULT NULL,
  `product_name` varchar(20) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `descp` longtext DEFAULT NULL,
  `intro` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `category_id`, `image`, `product_name`, `price`, `descp`, `intro`) VALUES
(1, 2, 'http://pizzahouse.themerex.net/wp-content/uploads/2016/08/product-12.png', 'Pepperoni', 200000, 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos.', NULL),
(2, 2, 'http://pizzahouse.themerex.net/wp-content/uploads/2016/08/product-9.png', 'Mozarella', 150, 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos.', NULL),
(3, 2, 'http://pizzahouse.themerex.net/wp-content/uploads/2016/08/product-11.png', 'Glute-Free Pizza', 180000, 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit.', NULL),
(4, 2, 'https://scontent.fhan2-1.fna.fbcdn.net/v/t1.15752-9/262827415_1046220369504881_365243686771078749_n.png?_nc_cat=101&ccb=1-5&_nc_sid=ae9488&_nc_ohc=fYWz28K9bj4AX8GqbMN&tn=8aMubE6Bs0m9ivtM&_nc_ht=scontent.fhan2-1.fna&oh=03_AVKlFCHnjMVXICej_xxLR-RFxczi8Ro0FwvpxE70q-ZNlw&oe=61DFD9DA', 'Thousand Islands', 230000, 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt.', NULL),
(5, 2, 'https://scontent.fhan2-1.fna.fbcdn.net/v/t1.15752-9/262163930_252009523664646_2070851698251163274_n.png?_nc_cat=102&ccb=1-5&_nc_sid=ae9488&_nc_ohc=ILMKvZeFXxEAX_tQ0WH&tn=8aMubE6Bs0m9ivtM&_nc_ht=scontent.fhan2-1.fna&oh=03_AVJbzHrxHpMYwmyKWfudQrXc_n762GhOftE7nksOZCWn7g&oe=61E0C671', 'Bolognese', 160000, 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit.', NULL),
(6, 2, 'https://scontent.fhan2-2.fna.fbcdn.net/v/t1.15752-9/263309827_1352444785185029_4621465491657860592_n.png?_nc_cat=111&ccb=1-5&_nc_sid=ae9488&_nc_ohc=7slFmvibwMQAX-3afIF&_nc_ht=scontent.fhan2-2.fna&oh=03_AVIoPzls8ljayZS8k0hEIBBi0h78X0xh5VEJYjJV_p1PQw&oe=61E0D01E', 'Polle Sunflower', 250000, 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est.', NULL),
(7, 2, 'https://scontent.fhan2-2.fna.fbcdn.net/v/t1.15752-9/263108688_723540065293320_4407011018903889624_n.png?_nc_cat=111&ccb=1-5&_nc_sid=ae9488&_nc_ohc=T_INmQBr7GoAX_PJ8ou&tn=8aMubE6Bs0m9ivtM&_nc_ht=scontent.fhan2-2.fna&oh=03_AVKDcGC8-ojWEiEd7_exwA2kOQRqPL-GrEfTt_kpw-Hc0w&oe=61E0990F', 'Teriyaki Poramonia', 200000, 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est.', NULL),
(8, 2, 'https://scontent.fhan2-2.fna.fbcdn.net/v/t1.15752-9/264747443_374127164487247_4095998590459379528_n.png?_nc_cat=111&ccb=1-5&_nc_sid=ae9488&_nc_ohc=Q6TmAdFqZCwAX_hthkB&_nc_ht=scontent.fhan2-2.fna&oh=03_AVI7D05WKB2QrgghDfkwoZ8SUF2YvgidBY6l0cHsASwyMg&oe=61E13186', 'Flagship Tavern', 280000, 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est.', NULL),
(9, 2, 'https://scontent.fhan2-4.fna.fbcdn.net/v/t1.15752-9/262500756_343836507089433_9120970007818915982_n.png?_nc_cat=100&ccb=1-5&_nc_sid=ae9488&_nc_ohc=CdnpRbJPdtwAX8gLM52&tn=8aMubE6Bs0m9ivtM&_nc_ht=scontent.fhan2-4.fna&oh=03_AVINU5vUrDFD2rp_oxeNAigJU-GHhM6M8IL4afWHgpWBbQ&oe=61E33CB2', 'Union Pizzeria', 180000, 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt.', NULL),
(10, 2, 'https://scontent.fhan2-3.fna.fbcdn.net/v/t1.15752-9/263170023_438178324481936_1431735922539968395_n.png?_nc_cat=107&ccb=1-5&_nc_sid=ae9488&_nc_ohc=iupoidzh55oAX9-66O9&_nc_ht=scontent.fhan2-3.fna&oh=03_AVKl1L812GgNojCkEQ6sf8LYm5fo5EccKyI1Fat-syVCdw&oe=61E13674', 'Melted Cheese', 250000, 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum.', NULL),
(11, 2, 'https://scontent.fhan2-4.fna.fbcdn.net/v/t1.15752-9/263169204_639343653922757_28529018127132624_n.png?_nc_cat=100&ccb=1-5&_nc_sid=ae9488&_nc_ohc=34yP3M_gu5AAX-UZPFP&_nc_ht=scontent.fhan2-4.fna&oh=03_AVKncECYJs9xGSeMgC8L8sMdxq6gZxDYsRvRM9IYPBSfuA&oe=61E3317F', 'Lover’s Pizzeria', 160000, 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet.', NULL),
(12, 2, 'https://scontent.fhan2-2.fna.fbcdn.net/v/t1.15752-9/264850163_431763538626827_7038506653860046833_n.png?_nc_cat=111&ccb=1-5&_nc_sid=ae9488&_nc_ohc=Jx1iU6w-hZQAX9kD245&_nc_ht=scontent.fhan2-2.fna&oh=03_AVJoE7p-GRmBV94oQv085SR-KMs_WlzlQSD4-_klAY7FXA&oe=61E294A8', 'Heavenly Delights', 180000, 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.', NULL),
(13, 3, 'http://pizzahouse.themerex.net/wp-content/uploads/2016/08/product-7.png', 'Quattro Formaggi', 150000, 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est', NULL),
(14, 3, 'http://pizzahouse.themerex.net/wp-content/uploads/2016/08/product-6.png', 'Gluten-Free Pasta', 250000, 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt', NULL),
(15, 4, 'http://pizzahouse.themerex.net/wp-content/uploads/2016/08/product-2.png', 'Prosciutto', 200000, 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore', NULL),
(16, 4, 'http://pizzahouse.themerex.net/wp-content/uploads/2016/08/product-8.png', 'Vegetarian Salad', 230000, 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_ingredient`
--

CREATE TABLE `tbl_product_ingredient` (
  `product_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `gram` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE `tbl_user_type` (
  `id` int(11) NOT NULL,
  `user_type` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`id`, `user_type`) VALUES
(1, 'Admin'),
(2, 'Customer'),
(3, 'Guest');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_addon`
--
ALTER TABLE `tbl_addon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_addon_category`
--
ALTER TABLE `tbl_addon_category`
  ADD PRIMARY KEY (`addon_id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_addon_values`
--
ALTER TABLE `tbl_addon_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addon_id` (`addon_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type_id` (`user_type_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type_id` (`user_type_id`);

--
-- Indexes for table `tbl_ingredient`
--
ALTER TABLE `tbl_ingredient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ingredient_material`
--
ALTER TABLE `tbl_ingredient_material`
  ADD PRIMARY KEY (`ingredient_id`,`material_id`),
  ADD KEY `material_id` (`material_id`);

--
-- Indexes for table `tbl_material`
--
ALTER TABLE `tbl_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `order_state_id` (`order_state_id`),
  ADD KEY `payment_method_id` (`payment_method_id`);

--
-- Indexes for table `tbl_order_item_group`
--
ALTER TABLE `tbl_order_item_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `tbl_order_item_option`
--
ALTER TABLE `tbl_order_item_option`
  ADD PRIMARY KEY (`product_id`,`order_id`,`addon_value_id`,`cart_order_num_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `addon_value_id` (`addon_value_id`),
  ADD KEY `cart_order_num_id` (`cart_order_num_id`);

--
-- Indexes for table `tbl_order_payment`
--
ALTER TABLE `tbl_order_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `tbl_order_state`
--
ALTER TABLE `tbl_order_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment_method`
--
ALTER TABLE `tbl_payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_product_ingredient`
--
ALTER TABLE `tbl_product_ingredient`
  ADD PRIMARY KEY (`product_id`,`ingredient_id`),
  ADD KEY `ingredient_id` (`ingredient_id`);

--
-- Indexes for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_addon`
--
ALTER TABLE `tbl_addon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_addon_values`
--
ALTER TABLE `tbl_addon_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_ingredient`
--
ALTER TABLE `tbl_ingredient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_material`
--
ALTER TABLE `tbl_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_order_item_group`
--
ALTER TABLE `tbl_order_item_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_order_payment`
--
ALTER TABLE `tbl_order_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order_state`
--
ALTER TABLE `tbl_order_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_payment_method`
--
ALTER TABLE `tbl_payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_addon_category`
--
ALTER TABLE `tbl_addon_category`
  ADD CONSTRAINT `tbl_addon_category_ibfk_1` FOREIGN KEY (`addon_id`) REFERENCES `tbl_addon` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_addon_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_addon_values`
--
ALTER TABLE `tbl_addon_values`
  ADD CONSTRAINT `tbl_addon_values_ibfk_1` FOREIGN KEY (`addon_id`) REFERENCES `tbl_addon` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD CONSTRAINT `tbl_admin_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `tbl_user_type` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD CONSTRAINT `tbl_customer_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `tbl_user_type` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_ingredient_material`
--
ALTER TABLE `tbl_ingredient_material`
  ADD CONSTRAINT `tbl_ingredient_material_ibfk_1` FOREIGN KEY (`ingredient_id`) REFERENCES `tbl_ingredient` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_ingredient_material_ibfk_2` FOREIGN KEY (`material_id`) REFERENCES `tbl_material` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`order_state_id`) REFERENCES `tbl_order_state` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_order_ibfk_3` FOREIGN KEY (`payment_method_id`) REFERENCES `tbl_payment_method` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_order_item_group`
--
ALTER TABLE `tbl_order_item_group`
  ADD CONSTRAINT `tbl_order_item_group_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_order_item_option`
--
ALTER TABLE `tbl_order_item_option`
  ADD CONSTRAINT `tbl_order_item_option_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_order_item_option_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_order_item_option_ibfk_3` FOREIGN KEY (`addon_value_id`) REFERENCES `tbl_addon_values` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_order_item_option_ibfk_4` FOREIGN KEY (`cart_order_num_id`) REFERENCES `tbl_order_item_group` (`id`);

--
-- Constraints for table `tbl_order_payment`
--
ALTER TABLE `tbl_order_payment`
  ADD CONSTRAINT `tbl_order_payment_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_product_ingredient`
--
ALTER TABLE `tbl_product_ingredient`
  ADD CONSTRAINT `tbl_product_ingredient_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_product_ingredient_ibfk_2` FOREIGN KEY (`ingredient_id`) REFERENCES `tbl_ingredient` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
