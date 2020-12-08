-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 08, 2020 at 06:43 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `DnDatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `base_chars`
--

CREATE TABLE `base_chars` (
  `id` int(11) NOT NULL,
  `label` varchar(24) NOT NULL,
  `character_class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `character_class`
--

CREATE TABLE `character_class` (
  `id` int(11) NOT NULL,
  `type` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `character_class`
--

INSERT INTO `character_class` (`id`, `type`) VALUES
(1, 'Monk'),
(2, 'Wizard'),
(3, 'Fighter'),
(4, 'Ranger'),
(5, 'Bard'),
(6, 'Warlock'),
(7, 'Sorcerer'),
(8, 'Barbarian'),
(9, 'Paladin'),
(10, 'Cleric'),
(11, 'Druid'),
(12, 'Rouge');

-- --------------------------------------------------------

--
-- Table structure for table `character_races`
--

CREATE TABLE `character_races` (
  `id` int(11) NOT NULL,
  `race` varchar(24) NOT NULL,
  `charisma _bonus` int(11) NOT NULL,
  `dexterity_bonus` int(11) NOT NULL,
  `intelligence_bonus` int(11) NOT NULL,
  `wisdom_bonus` int(11) NOT NULL,
  `constitution_bonus` int(11) NOT NULL,
  `strength_bonus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `character_races`
--

INSERT INTO `character_races` (`id`, `race`, `charisma _bonus`, `dexterity_bonus`, `intelligence_bonus`, `wisdom_bonus`, `constitution_bonus`, `strength_bonus`) VALUES
(1, 'Elf', 0, 2, 0, 0, 0, 0),
(2, 'Dragonborn', 1, 0, 0, 0, 0, 2),
(3, 'Dwarf', 0, 0, 0, 0, 2, 0),
(4, 'Gnome', 0, 0, 2, 0, 0, 0),
(5, 'Half-Elf', 2, 1, 0, 1, 0, 0),
(6, 'Half-Orc', 0, 0, 0, 0, 1, 2),
(7, 'Halfling', 0, 2, 0, 0, 0, 0),
(8, 'Human', 1, 1, 1, 1, 1, 1),
(9, 'Tiefling', 2, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `feats`
--

CREATE TABLE `feats` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feats`
--

INSERT INTO `feats` (`id`, `name`, `description`) VALUES
(1, 'Actor', '+1 in Cha., advantage on Deception and Performance checks, mimic the speech of a person or the sounds made by a creature.'),
(2, 'Alert', '+5 to initiative, you can\'t be surprised, and creatures you don\'t see don\'t gain advantage on attack roll against you.'),
(3, 'Athlete', '+1 in Str. or Dex., you stand up and climb more quickly, and you can jump with only a 5-ft run.\r\n'),
(4, 'Charger', 'You can let an ally within 30 ft of you to reroll a 1 on a d20.\r\n'),
(5, 'Crossbow Expert', 'You ignore the loading property of crossbows and don\'t have disadvantage for being in contact with a creature when you shoot.\r\n'),
(6, 'Dual Wielder	', '+1 to CA if you\'re wielding a melee weapon in each hand, two-weapon fighting with non-light weapon, draw two weapons.\r\n'),
(7, 'Dungeon Delver', 'Advantage to Perception and Investigation checks, to saving throws vs traps, and search for traps at normal pace.\r\n'),
(8, 'Durable', '+1 in Con. and for each Hit Dice you regain a minimum of hit points equals to 2 x your Constitution modifier.\r\n'),
(9, 'Great Weapon Master', 'Extra attack after a melee critical hit and you can choose to take -5 to attack roll to add +10 to damage with an heavy weapon.\r\n'),
(11, 'Healer', 'You can stabilize a creature and restore it to 1 hp, or restore [1d6+4+its number of Hit Dice] hp to it.\r\n'),
(13, 'Keen Mind', '+1 in Int., you know which way is north, when is the next sunrise/sunset, and recall any events within the past month.'),
(14, 'Lightly Armored', '+1 in Str. or Dex. and you gain profociency with light armor.'),
(15, 'Linguist', '+1 in Int., you learn three languages, and you can ably create ciphers.'),
(16, 'Lucky', 'You can reroll one d20 or force to reroll an attack roll against you (3/long rest).'),
(17, 'Mage Slayer', 'You can use a reaction to make a melee attack against a spellcaster and advantage on saving throws against spell within 5 ft.'),
(18, 'Magic Initiate', 'You learn two cantrips and one 1st-level spell from one class.'),
(19, 'Martial Adept', 'You learn two maneuvers from Battle Master archetype and gain one superiority die (d6).'),
(20, 'Mobile', 'Your speed increase by 10 ft, you can Dash on difficult terrain without malus, and don\'t provoke opportunity attacks in melee.'),
(21, 'Mounted Combatant', 'Advantage on melee attacks against unmounted creature and force an attack to target you instead of your mount.'),
(22, 'Observant', '+1 in Int. or Wis., you can read on lips, and you have a +5 bonus in passive Perception and passive Investigation.'),
(23, 'Polearm Master', 'You can make an extra attack with a polearm weapon, and make an opportunity attack if a creature enter your reach.'),
(24, 'Resilient', '+1 in one ability and you gain proficiency in saving throws using this ability.'),
(25, 'Savage Attacker', 'You can reroll melee weapon attack damage once per turn.'),
(26, 'Sentinel', 'A successful OA reduce creature\'s speed to 0 for this turn and possibility to make an OA even if the ennemy take Disengage.'),
(27, 'Sharpshooter', 'Your ranged attacks ignore some cover, no disavantage at long range, and possibility to take -5 to hit for +10 on ranged damage.'),
(28, 'Shield Master', 'Attack also allows to shove, shield bonus to Dex. saving throws againts spells, and no 1/2 damage on successful saving throw.'),
(29, 'Skilled', 'You gain proliciency with three skills or tools.'),
(30, 'Tavern Brawler', '+1 in Str. or Con., proficiency with improvised weapons, d4 for unarmed strike, and grapple with a bonus action.'),
(31, 'Tough', 'Your hit point maximum increases by an amount equal to twice your level then by +2 at each level.'),
(32, 'Weapon Master', '+1 in Str. or Dex. and you gain proficiency with four weapons.');

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `id` int(11) NOT NULL,
  `dm_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `class_id` int(11) NOT NULL,
  `race_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `party_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `player_feats`
--

CREATE TABLE `player_feats` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `feat_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `player_skills`
--

CREATE TABLE `player_skills` (
  `id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `player_stats`
--

CREATE TABLE `player_stats` (
  `id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `stat_id` int(11) NOT NULL,
  `stat_number` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `game_master` varchar(24) NOT NULL,
  `player_character` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(24) NOT NULL,
  `description` text NOT NULL,
  `related_stat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill_name`, `description`, `related_stat_id`) VALUES
(1, 'Athletics', 'Your Strength (Athletics) check covers difficult situations you encounter while climbing, jumping, or swimming. Examples include the following activities:\r\n\r\nYou attempt to climb a sheer or slippery cliff, avoid hazards while scaling a wall, or cling to a surface while something is trying to knock you off.\r\nYou try to jump an unusually long distance or pull off a stunt midjump.\r\nYou struggle to swim or stay afloat in treacherous currents, storm-­‐‑tossed waves, or areas of thick seaweed. Or another creature tries to push or pull you underwater or otherwise interfere with your swimming.', NULL),
(2, 'Acrobatics', 'Your Dexterity (Acrobatics) check covers your attempt to stay on your feet in a tricky situation, such as when you’re trying to run across a sheet of ice, balance on a tightrope, or stay upright on a rocking ship’s deck. The GM might also call for a Dexterity (Acrobatics) check to see if you can perform acrobatic stunts, including dives, rolls, somersaults, and flips.', NULL),
(3, 'Sleight of Hand', 'Whenever you attempt an act of legerdemain or manual trickery, such as planting something on someone else or concealing an object on your person, make a Dexterity (Sleight of Hand) check. The GM might also call for a Dexterity (Sleight of Hand) check to determine whether you can lift a coin purse off another person or slip something out of another person’s pocket.', NULL),
(4, 'Stealth', 'Make a Dexterity (Stealth) check when you attempt to conceal yourself from enemies, slink past guards, slip away without being noticed, or sneak up on someone without being seen or heard.', NULL),
(5, 'Arcana', 'Your Intelligence (Arcana) check measures your ability to recall lore about spells, magic items, eldritch symbols, magical traditions, the planes of existence, and the inhabitants of those planes.', NULL),
(6, 'History', 'Your Intelligence (History) check measures your ability to recall lore about historical events, legendary people, ancient kingdoms, past disputes, recent wars, and lost civilizations.', NULL),
(7, 'Investigation', 'When you look around for clues and make deductions based on those clues, you make an Intelligence (Investigation) check. You might deduce the location of a hidden object, discern from the appearance of a wound what kind of weapon dealt it, or determine the weakest point in a tunnel that could cause it to collapse. Poring through ancient scrolls in search of a hidden fragment of knowledge might also call for an Intelligence (Investigation) check', NULL),
(8, 'Nature', 'Your Intelligence (Nature) check measures your ability to recall lore about terrain, plants and animals, the weather, and natural cycles.', NULL),
(9, 'Religion', 'Your Intelligence (Religion) check measures your ability to recall lore about deities, rites and prayers, religious hierarchies, holy symbols, and the practices of secret cults.', NULL),
(10, 'Animal Handling', 'When there is any question whether you can calm down a domesticated animal, keep a mount from getting spooked, or intuit an animal’s intentions, the GM might call for a Wisdom (Animal Handling) check. You also make a Wisdom (Animal Handling) check to control your mount when you attempt a risky maneuver.', NULL),
(11, 'Insight', 'Your Wisdom (Insight) check decides whether you can determine the true intentions of a creature, such as when searching out a lie or predicting someone’s next move. Doing so involves gleaning clues from body language, speech habits, and changes in mannerisms.', NULL),
(12, 'Medicine', 'A Wisdom (Medicine) check lets you try to stabilize a dying companion or diagnose an illness.', NULL),
(13, 'Perception', 'Your Wisdom (Perception) check lets you spot, hear, or otherwise detect the presence of something. It measures your general awareness of your surroundings and the keenness of your senses. For example, you might try to hear a conversation through a closed door, eavesdrop under an open window, or hear monsters moving stealthily in the forest. Or you might try to spot things that are obscured or easy to miss, whether they are orcs lying in ambush on a road, thugs hiding in the shadows of an alley, or candlelight under a closed secret door.', NULL),
(14, 'Survival', 'The GM might ask you to make a Wisdom (Survival) check to follow tracks, hunt wild game, guide your group through frozen wastelands, identify signs that owlbears live nearby, predict the weather, or avoid quicksand and other natural hazards.', NULL),
(15, 'Deception', 'Your Charisma (Deception) check determines whether you can convincingly hide the truth, either verbally or through your actions. This deception can encompass everything from misleading others through ambiguity to telling outright lies. Typical situations include trying to fast-­‐‑ talk a guard, con a merchant, earn money through gambling, pass yourself off in a disguise, dull someone’s suspicions with false assurances, or maintain a straight face while telling a blatant lie.', NULL),
(16, 'Intimidation', 'When you attempt to influence someone through overt threats, hostile actions, and physical violence, the GM might ask you to make a Charisma (Intimidation) check. Examples include trying to pry information out of a prisoner, convincing street thugs to back down from a confrontation, or using the edge of a broken bottle to convince a sneering vizier to reconsider a decision.', NULL),
(17, 'Performance', 'Your Charisma (Performance) check determines how well you can delight an audience with music, dance, acting, storytelling, or some other form of entertainment.', NULL),
(18, 'Persuasion', 'When you attempt to influence someone or a group of people with tact, social graces, or good nature, the GM might ask you to make a Charisma (Persuasion) check. Typically, you use persuasion when acting in good faith, to foster friendships, make cordial requests, or exhibit proper etiquette. Examples of persuading others include convincing a chamberlain to let your party see the king, negotiating peace between warring tribes, or inspiring a crowd of townsfolk.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `id` int(11) NOT NULL,
  `stat_name` varchar(24) NOT NULL,
  `stat_discription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(144) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, '1', '1'),
(2, '2', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `base_chars`
--
ALTER TABLE `base_chars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `character_class`
--
ALTER TABLE `character_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `character_races`
--
ALTER TABLE `character_races`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feats`
--
ALTER TABLE `feats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player_feats`
--
ALTER TABLE `player_feats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player_skills`
--
ALTER TABLE `player_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player_stats`
--
ALTER TABLE `player_stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `base_chars`
--
ALTER TABLE `base_chars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `character_class`
--
ALTER TABLE `character_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `character_races`
--
ALTER TABLE `character_races`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feats`
--
ALTER TABLE `feats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `player_feats`
--
ALTER TABLE `player_feats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `player_skills`
--
ALTER TABLE `player_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `player_stats`
--
ALTER TABLE `player_stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `stats`
--
ALTER TABLE `stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
