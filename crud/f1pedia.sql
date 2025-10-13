-- Buat Database
CREATE DATABASE IF NOT EXISTS f1pedia;

USE f1pedia;

-- Tabel untuk data pembalap dengan field lengkap
CREATE TABLE drivers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    driver_id VARCHAR(50) NOT NULL UNIQUE,
    name VARCHAR(100) NOT NULL,
    number VARCHAR(10) NOT NULL,
    team VARCHAR(100) NOT NULL,
    country VARCHAR(100) NOT NULL,
    dob VARCHAR(50) NOT NULL,
    podiums VARCHAR(10) NOT NULL,
    points VARCHAR(20) NOT NULL,
    grands_prix VARCHAR(10) NOT NULL,
    championships VARCHAR(10) NOT NULL,
    image VARCHAR(500) NOT NULL
);

-- Insert data lengkap semua pembalap F1 2025
INSERT INTO drivers (driver_id, name, number, team, country, dob, podiums, points, grands_prix, championships, image) VALUES
('verstappen', 'Max VERSTAPPEN', '1', 'Red Bull Racing', 'Netherlands', '30 September 1997', '107', '2805.5', '193', '3', 'https://www.formula1.com/content/dam/fom-website/drivers/M/MAXVER01_Max_Verstappen/maxver01.png.transform/1col/image.png'),
('hamilton', 'Lewis HAMILTON', '44', 'Ferrari', 'Great Britain', '7 January 1985', '197', '4685.5', '342', '7', 'https://www.formula1.com/content/dam/fom-website/drivers/L/LEWHAM01_Lewis_Hamilton/lewham01.png.transform/1col/image.png'),
('leclerc', 'Charles LECLERC', '16', 'Ferrari', 'Monaco', '16 October 1997', '36', '1235', '136', '0', 'https://www.formula1.com/content/dam/fom-website/drivers/C/CHALEC01_Charles_Leclerc/chalec01.png.transform/1col/image.png'),
('norris', 'Lando NORRIS', '4', 'McLaren', 'Great Britain', '13 November 1999', '21', '892', '114', '0', 'https://www.formula1.com/content/dam/fom-website/drivers/L/LANNOR01_Lando_Norris/lannor01.png.transform/1col/image.png'),
('alonso', 'Fernando ALONSO', '14', 'Aston Martin', 'Spain', '29 July 1981', '106', '2327', '380', '2', 'https://www.formula1.com/content/dam/fom-website/drivers/F/FERALO01_Fernando_Alonso/feralo01.png.transform/1col/image.png'),
('russell', 'George RUSSELL', '63', 'Mercedes', 'Great Britain', '15 February 1998', '13', '658', '98', '0', 'https://www.formula1.com/content/dam/fom-website/drivers/G/GEORUS01_George_Russell/georus01.png.transform/1col/image.png'),
('piastri', 'Oscar PIASTRI', '81', 'McLaren', 'Australia', '6 April 2001', '5', '248', '42', '0', 'https://www.formula1.com/content/dam/fom-website/drivers/O/OSCPIA01_Oscar_Piastri/oscpia01.png.transform/1col/image.png'),
('sainz', 'Carlos SAINZ', '55', 'Williams', 'Spain', '1 September 1994', '23', '1171.5', '193', '0', 'https://www.formula1.com/content/dam/fom-website/drivers/C/CARSAI01_Carlos_Sainz/carsai01.png.transform/1col/image.png'),
('gasly', 'Pierre GASLY', '10', 'Alpine', 'France', '7 February 1996', '4', '423', '145', '0', 'https://www.formula1.com/content/dam/fom-website/drivers/P/PIEGAS01_Pierre_Gasly/piegas01.png.transform/1col/image.png'),
('albon', 'Alexander ALBON', '23', 'Williams', 'Thailand', '23 March 1996', '2', '241', '86', '0', 'https://www.formula1.com/content/dam/fom-website/drivers/A/ALEALB01_Alexander_Albon/alealb01.png.transform/1col/image.png'),
('stroll', 'Lance STROLL', '18', 'Aston Martin', 'Canada', '29 October 1998', '3', '278', '152', '0', 'https://www.formula1.com/content/dam/fom-website/drivers/L/LANSTR01_Lance_Stroll/lanstr01.png.transform/1col/image.png'),
('ocon', 'Esteban OCON', '31', 'Haas', 'France', '17 September 1996', '3', '435', '138', '0', 'https://www.formula1.com/content/dam/fom-website/drivers/E/ESTOCO01_Esteban_Ocon/estoco01.png.transform/1col/image.png'),
('tsunoda', 'Yuki TSUNODA', '22', 'Red Bull Racing', 'Japan', '11 May 2000', '0', '89', '80', '0', 'https://www.formula1.com/content/dam/fom-website/drivers/Y/YUKTSU01_Yuki_Tsunoda/yuktsu01.png.transform/1col/image.png'),
('hulkenberg', 'Nico HULKENBERG', '27', 'Sauber', 'Germany', '19 August 1987', '0', '552', '215', '0', 'https://www.formula1.com/content/dam/fom-website/drivers/N/NICHUL01_Nico_Hulkenberg/nichul01.png.transform/1col/image.png'),
('bearman', 'Oliver BEARMAN', '87', 'Haas', 'Great Britain', '8 May 2005', '0', '7', '6', '0', 'https://www.formula1.com/content/dam/fom-website/drivers/O/OLIBEA01_Oliver_Bearman/olibea01.png.transform/1col/image.png'),
('lawson', 'Liam LAWSON', '30', 'Racing Bulls', 'New Zealand', '11 February 2002', '0', '4', '11', '0', 'https://www.formula1.com/content/dam/fom-website/drivers/L/LIALAW01_Liam_Lawson/lialaw01.png.transform/1col/image.png'),
('hadjar', 'Isack HADJAR', '6', 'Racing Bulls', 'France', '28 September 2004', '0', '0', '0', '0', 'https://www.formula1.com/content/dam/fom-website/drivers/I/ISAHAD01_Isack_Hadjar/isahad01.png.transform/1col/image.png'),
('antonelli', 'Kimi ANTONELLI', '12', 'Mercedes', 'Italy', '25 August 2006', '0', '0', '0', '0', 'https://www.formula1.com/content/dam/fom-website/drivers/A/ANDANT01_Andrea_Kimi_Antonelli/andant01.png.transform/1col/image.png'),
('colapinto', 'Franco COLAPINTO', '43', 'Alpine', 'Argentina', '27 May 2003', '0', '5', '9', '0', 'https://www.formula1.com/content/dam/fom-website/drivers/F/FRACOL01_Franco_Colapinto/fracol01.png.transform/1col/image.png'),
('bortoleto', 'Gabriel BORTOLETO', '5', 'Sauber', 'Brazil', '14 October 2004', '0', '0', '0', '0', 'https://www.formula1.com/content/dam/fom-website/drivers/G/GABBOR01_Gabriel_Bortoleto/gabbor01.png.transform/1col/image.png');