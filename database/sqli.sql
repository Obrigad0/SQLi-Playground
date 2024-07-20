-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Lug 15, 2024 alle 19:53
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sqli`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `ricette`
--

CREATE TABLE `ricette` (
  `nome` varchar(255) NOT NULL,
  `descrizione` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ricette`
--

INSERT INTO `ricette` (`nome`, `descrizione`) VALUES
('Arancini', 'Palline di riso ripiene di ragù, piselli e mozzarella, fritte.'),
('Brasato al Barolo', 'Carne di manzo cotta lentamente nel vino Barolo con verdure.'),
('Cacciucco', 'Zuppa di pesce tipica della cucina livornese.'),
('Cannoli Siciliani', 'Dolci a base di cialda croccante ripiena di ricotta dolce.'),
('Caponata', 'Piatto siciliano a base di melanzane, pomodori, cipolle, olive e capperi.'),
('Cassata Siciliana', 'Dolce a base di pan di Spagna, ricotta, frutta candita e pasta di mandorle.'),
('Fiori di Zucca Ripieni', 'Fiori di zucca farciti con mozzarella e acciughe, fritti in pastella.'),
('Focaccia', 'Pane piatto condito con olio d\'oliva, sale e rosmarino.'),
('Frittata di Cipolle', 'Frittata semplice con cipolle dorate.'),
('Gnocchi di Patate', 'Gnocchi fatti con patate, farina e uova, serviti con vari condimenti come sugo di pomodoro.'),
('Lasagne alla Bolognese', 'Pasta al forno con ragù di carne, besciamella e parmigiano.'),
('Minestrone', 'Zuppa di verdure miste, spesso con pasta o riso.'),
('Ossobuco', 'Stinco di vitello cotto lentamente con vino bianco e brodo, servito con gremolata.'),
('Panna Cotta', 'Dolce al cucchiaio a base di panna, zucchero e gelatina, spesso servito con frutti di bosco.'),
('Panzanella', 'Insalata estiva di pane raffermo, pomodori, cipolla, basilico e cetrioli, condita con olio e aceto.'),
('Parmigiana di Melanzane', 'Melanzane fritte disposte a strati con pomodoro, mozzarella e parmigiano, cotte al forno.'),
('Pasta alla Norma', 'Pasta condita con melanzane fritte, pomodoro, ricotta salata e basilico.'),
('Pesto alla Genovese', 'Salsa a base di basilico, pinoli, aglio, parmigiano e olio d\'oliva.'),
('Pizza Margherita', 'Pizza con pomodoro, mozzarella, basilico e olio d\'oliva.'),
('Polenta', 'Piatto a base di farina di mais, servito con vari condimenti come formaggi o carne.'),
('Pollo alla Cacciatora', 'Pollo cotto in umido con pomodori, olive, capperi e vino bianco.'),
('Ribollita', 'Zuppa toscana di pane raffermo e verdure.'),
('Risotto alla Milanese', 'Risotto cremoso con zafferano e midollo di bue.'),
('Saltimbocca alla Romana', 'Fettine di vitello con prosciutto crudo e salvia, cotte nel vino bianco.'),
('Spaghetti alla Carbonara', 'Un classico della cucina Romana con guanciale, pecorino, uova e pepe.'),
('Strudel di Mele', 'Dolce a base di pasta sfoglia ripiena di mele, uvetta e cannella.'),
('Tagliatelle al Ragù', 'Pasta all\'uovo condita con un ricco ragù di carne.'),
('Tiramisu', 'Un dolce al cucchiaio a base di savoiardi, mascarpone, caffè e cacao.'),
('Vitello Tonnato', 'Fettine di vitello servite fredde con salsa tonnata a base di tonno, maionese e capperi.'),
('Zuppa Inglese', 'Dolce al cucchiaio a base di pan di Spagna, crema pasticcera e alchermes.');

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('Clara', 'password1'),
('Flavio', 'password2'),
('Giuseppe', 'Password4'),
('Mario', 'password3');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `ricette`
--
ALTER TABLE `ricette`
  ADD PRIMARY KEY (`nome`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
