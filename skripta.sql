drop database if exists s0122215644_1;
create database s0122215644_1 character set utf8 collate = utf8_general_ci;
use s0122215644_1;

create table dogadaj (
	sifra int not null primary key auto_increment,
	vrsta int not null,
	datum date,
	naziv varchar(250) not null,
	opis varchar(10000) not null,
	operater int not null
) engine=innodb;

create table komentar (
	sifra int not null primary key auto_increment,
	operater varchar(250),
	tekst varchar(1000),
	dogadaj int not null
) engine=innodb;

create table operater (
	sifra int not null primary key auto_increment,
	ime varchar(50) not null,
	prezime varchar(50) not null,
	email varchar(50) not null,
	lozinka char(32) not null
) engine=innodb;

create table prijava (
	sifra int not null primary key auto_increment,
	ime varchar(50) not null,
	prezime varchar(50),
	dogadaj int not null
) engine=innodb;

create table prijedlozi (
	sifra int not null primary key auto_increment,
	osoba varchar(100),
	mail varchar(50) not null,
	tekst varchar(1000) not null
) engine=innodb;

create table slika (
	sifra int not null primary key auto_increment,
	putanja varchar(500) not null,
	dogadaj int not null
) engine=innodb;

create table vrsta (
	sifra int not null primary key auto_increment,
	naziv varchar(50) not null
) engine=innodb;

alter table dogadaj add foreign key (vrsta) references vrsta(sifra);
alter table dogadaj add foreign key (operater) references operater(sifra);
alter table komentar add foreign key (dogadaj) references dogadaj(sifra);
alter table prijava add foreign key (dogadaj) references dogadaj(sifra);
alter table slika add foreign key (dogadaj) references dogadaj(sifra);

insert into dogadaj (vrsta, datum, naziv, opis, operater)
	values (4, '2015-06-13', 'Phonogram slušaonica #16: Soundtracks', 'U subotu 13.6. održava se nova tematska glazbena slušaonica u Caffe Bar Voodoo, a ovaj puta ćemo se družiti uz glazbu koja je obilježila neke od vaših i naših najdražih filmova i televizijskih serija. Na repertoaru su glazbene podloge iz filmova poput 500 Days of Summer, Donnie Darko, 24 Hour Party People, Juno, Amélie te serija poput True Detective, The Wire, Freaks and Geeks, Skins, Misfits itd. Ako imate neku preporuku ili prijedlog, slobodno lijepite na zid. Startamo od 21 sat. Vidimo se!', 1);
insert into dogadaj (vrsta, datum, naziv, opis, operater)
	values (3, '2015-06-18', 'PUB KVIZ &quot;SLABA TOČKA&quot;', 'Ponovno se igramo u četvrtak u pola 7! Ekipa Rumunjska Pula je pokazala najveće znanje u prošlotjednom kvizu i u velikom stilu se vratila kao pobjednik. Ovotjedni kviz sastavlja gazda Kruno i kao i uvijek, bit će jednako zastupljena sva područja. Naš i vaš kviz je dokaz da se kroz igru znanja možemo dobro zabaviti, opustiti i družiti! Kao i uvijek, Voodoo će se pobrinuti da cijene budu maksimalno povoljne, a to znači da su sva piva 10 kuna za vrijeme kviza. Vidimo se na kvizu! Jedva čekamo da počne! ZNANJE JE KUL, A PIVO JE BAJKA!', 1);
insert into dogadaj (vrsta, datum, naziv, opis, operater)
	values (4, '2015-06-19', 'DOMAĆI PETAK + NAGRADNA IGRA', 'Kao i uvijek, petak je dan za isključivo domaći rock! Uz najveće prošle i aktualne hitove popijte Žuju za 10 kuna, opustite se na našoj kul terasi i sudjelujte u nagradnoj igri! Netko od vas osvojit će poklon Voodoo bon od 100 kuna. Isto tako, medica će biti 5 kuna! Radujemo se vašem dolasku i dobroj zabavi! RADIMO DO 2.', 1);
insert into dogadaj (vrsta, datum, naziv, opis, operater)
	values (4, '2015-06-12', 'GLAZBOM PROTIV RAZBOJNIKA VOL. 1 + NAGRADNA IGRA', 'Dođite u caffe bar Voodoo na slušaonicu domaćeg rocka na najboljoj terasi u gradu! Za vas smo pripremili i malu nagradnu igru, tj. netko od vas će osvojiti bon za cugu u vrijednosti od 100 kuna. Žuja je na akciji, 10 kuna cijeli dan, a isto tako i medica koja je 5 kuna.', 1);
insert into dogadaj (vrsta, datum, naziv, opis, operater)
	values (5, '2015-05-02', 'INES VOLI DISKO + SUBOTA UZ OŽUJSKO', 'Započni vikend u disko izdanju! Za sve vas koji se želite počastiti Ožujskim po nevjerojatnoj cijeni od 10 kuna i brutalno dobrim disko hitovima po izboru vaše Ines, vaše odredište bit će, naravno, Voodoo bar! Zaplešite i otplovite u večernji izlazak i noć pod svjetlima Voodoo bara i našim nadaleko poznatim disko kuglama. Neka vam mala ogledalca na disko kuglama cijelu noć govore da ste baš vi najljepši na svijetu! Čekamo vas!', 1);
insert into dogadaj (vrsta, datum, naziv, opis, operater)
	values (2, '2015-05-09', 'DJ KAMENITSKY U VOODOO-U+SUBOTA UZ OŽUJSKO', 'Subota je dan kad vas Kameni tjera na ples! Plešite uz njegov izbor glazbe, koja je prošli put bila izvanredna. Uz zvukove breaks/electro/house glazbe otplovite u subotnju noć. Cijena Žuje je 10 kuna, a pelinkovca 5.', 1);
insert into dogadaj (vrsta, datum, naziv, opis, operater)
	values (4, '2015-05-16', 'Phonogram slušaonica #15: Twee pop / Indie pop', 'Došlo je vrijeme za još jednu tematsku Phonogram slušaonicu.Twee je podžanr indie popa rođen 1986. izlaskom kompilacije C86 (album) za NME Magazine. Stilski pod utjecajem post punka, popa 60-ih i D.I.Y. estetike, sa slatkim (pretežito) ženskim vokalima, twee pjeva himne o nevinosti i neuzvraćenoj ljubavi.Izdavačke kuće koje su najznačajnije doprinijele ovome žanru su britanska Sarah Records i američka K Records.U subotu od 21 h u Caffe Bar Voodoo moći ćete čuti slatke glasove pionira twee popa poput: Talulah Gosh, The Shop Assistants, The Pastels, Heavenly, Beat Happening, Black Tambourine, The Vaselines te nešto novije: Camera Obscura, Belle and Sebastian, The Pains of Being Pure at Heart, Los Campesinos!, Architecture in Helsinki, Vivian Girls, Hospitality, Fear Of Men i mnoge druge...', 1);
insert into dogadaj (vrsta, datum, naziv, opis, operater)
	values (4, '2015-06-23', 'VOODOO ELECTRO NIGHT + SUBOTA UZ OŽUJSKO', 'Započni subotnju noć u caffe baru Voodoo uz taktove elektro glazbe! Ovaj put za vas smo odabrali najbolje hitove tog žanra, koji je pravi odabir za subotnji izlazak. Osjeti ugodnu atmosferu caffe bara Voodoo, koji ima i jako dobre cijene! Žuja je na akciji i 10 kuna je cijeli dan. Vidimo se!', 1);
insert into dogadaj (vrsta, datum, naziv, opis, operater)
	values (6, '2015-05-29', 'PETAK UZ OŽUJSKO I ROŠTILJ NA TERASI', 'Caffe bar Voodoo će vas opet počastiti besplatnom klopom i odličnim cijenama piva! Započni vikend uz kobasice, ćevape i pivo. I luk, naravno. Glazba će biti još vrelija od kobasica! Slušamo samo hitove! Cijeli dan Ožujsko 10 kuna.Od 16 do 20 h sva piva 10 kuna. NE MORAŠ RUČATI KOD KUĆE. RUČAK JE KOD NAS!', 1);
insert into dogadaj (vrsta, datum, naziv, opis, operater)
	values (4, '2015-05-30', 'Phonogramov Dobar Zvuk u Voodoou', 'U subotu 30.5. se ponovno družimo u Caffe Bar Voodoo uz još jedan program Dobrog Zvuka. Kao i do sada moći će se čuti aktualna i najnovija izdanja sa svjetske i domaće nezavisne scene od bendova poput Hot Chip, Ducktails, Tame Impala, Built to Spill, The Vaccines, Ti, VVhile u kombinaciji s uvijek dobrodošlim hitovima izvođača poput Foals, Arcade Fire, Interpol, Modest Mouse te i ponekim klasikom izvođača poput The Smiths, Joy Division i The Cure. Program starta od 21 sat, vidimo se!', 1);
insert into dogadaj (vrsta, datum, naziv, opis, operater)
	values (4, '2015-06-20', 'PUNK SUBOTA UZ OŽUJSKO', 'Započni vikend u caffe baru Voodoo i otplovi u subotnju noć sa zvukovima najboljih punk bendova i pjesama ikada! Kao što i sami znate, kod nas je muzika uvijek na nivou, kao i to da je Žuja svaki vikend 10 kuna! Stoga dođite, popijte ladnu Žuju. Na akciji će biti i pelinkovac po 5 kuna!', 1);

insert into komentar (operater, tekst, dogadaj)
	values ('mani', 'isuse jedva čekam ovu slušaonu, bit će presuper :D', 1);
insert into komentar (operater, tekst, dogadaj)
	values ('drea', 'č.r.v. će sabit ovaj četvrtak!', 2);
insert into komentar (operater, tekst, dogadaj)
	values ('tena', 'aaaajme majko ima da osvojim nagradu', 3);
insert into komentar (operater, tekst, dogadaj)
	values ('manđa', 'prošli put sam skoro osvojila nagradu, a ovaj put ću sigurno', 4);
insert into komentar (operater, tekst, dogadaj)
	values ('diskorak', 'obožavam disko!', 5);
insert into komentar (operater, tekst, dogadaj)
	values ('drea', 'super čagica bila :D', 6);
insert into komentar (operater, tekst, dogadaj)
	values ('hippie', 'ovo je bio takav chill', 7);
insert into komentar (operater, tekst, dogadaj)
	values ('elektrokralj', 'samo electro!', 8);
insert into komentar (operater, tekst, dogadaj)
	values ('drea', 'presuper je roštilj, jedva čekam opet :D ', 9);
insert into komentar (operater, tekst, dogadaj)
	values ('manijak', 'obožavam ove underground bendove koje nitko ne zna, hipsteri blesavi', 10);
insert into komentar (operater, tekst, dogadaj)
	values ('drea', 'i ja isto!', 1);

insert into operater (ime, prezime, email, lozinka)
	values ('Andrea', 'Mihaljević', 'amihaljevic@ffos.hr', md5('baze'));
insert into operater (ime, prezime, email, lozinka)
	values ('Bruno', 'Var', 'bruno@uin.hr', md5('123456'));
insert into operater (ime, prezime, email, lozinka)
	values ('Tomislav', 'Jakopec', 'tjakopec@ffos.hr', md5('t'));

insert into prijava (ime, prezime, dogadaj)
	values ('Andrea', 'Mihaljević', 2);
insert into prijava (ime, prezime, dogadaj)
	values ('Manuela', 'Mikulecki', 2);
insert into prijava (ime, prezime, dogadaj)
	values ('Barbara', 'Kujavec', 2);
insert into prijava (ime, prezime, dogadaj)
	values ('Sara', 'Švitek', 2);
insert into prijava (ime, prezime, dogadaj)
	values ('Ivana', 'Turk', 2);
insert into prijava (ime, prezime, dogadaj)
	values ('Stjepan', 'Zlatić', 2);

insert into prijedlozi (osoba, mail, tekst)
	values ('Andrea Mihaljević', 'amihaljevic@ffos.hr', 'Hackaton');
insert into prijedlozi (osoba, mail, tekst)
	values ('Manuela Mikulecki', 'mmikulecki@ffos.hr', 'zicer zicer');
insert into prijedlozi (osoba, mail, tekst)
	values ('Tomislav Jakopec', 'tjakopec@ffos.hr', 'Imam prijedlog da organizirate jedan Hackaton u vašem lokalu. Smatram da bi to bila dobra ideja da se privuku novi korisnici.');
insert into prijedlozi (osoba, mail, tekst)
	values ('manuela mandja milica', 'mmikulecki@ffos.hr', 'ja imam nekoliko prijedloga i iskreno se nadam da ćete ih uvažiti. naime, popravit te linkove nek se taj navbar pojavljuje svugdje jerbo možete ostat bez bodova ukoliko vam svaka stranica ne vodi na svaku. nadalje, pozabavite se malo dizajnom da to izgleda kak bi se reklo, malo font, boja ovo ono, kako vas volja ali nešto napravite. eto hvala na razumijevanju i pozz, vidimo se u čet na kvizu, č.r.v. 4ever');

insert into slika (putanja, dogadaj)
	values ('slike_dogadaja/phonogram_slusaonica.png', 1);
insert into slika (putanja, dogadaj)
	values ('slike_dogadaja/kviz_cover.jpg', 2);
insert into slika (putanja, dogadaj)
	values ('slike_dogadaja/slusaona_rock.jpg', 3);
insert into slika (putanja, dogadaj)
	values ('slike_dogadaja/slusaona_rock.jpg', 4);
insert into slika (putanja, dogadaj)
	values ('slike_dogadaja/volim_disko.jpg', 5);
insert into slika (putanja, dogadaj)
	values ('slike_dogadaja/', 6);
insert into slika (putanja, dogadaj)
	values ('slike_dogadaja/', 7);
insert into slika (putanja, dogadaj)
	values ('slike_dogadaja/', 8);
insert into slika (putanja, dogadaj)
	values ('slike_dogadaja/rostilj.jpg', 9);
insert into slika (putanja, dogadaj)
	values ('slike_dogadaja/', 10);
insert into slika (putanja, dogadaj)
	values ('slike_dogadaja/punk_subota.jpg', 11);

insert into vrsta (naziv)
	values ('Izložba');
insert into vrsta (naziv)
	values ('Svirka');
insert into vrsta (naziv)
	values ('Kviz');
insert into vrsta (naziv)
	values ('Slušaona');
insert into vrsta (naziv)
	values ('Volim Disko');
insert into vrsta (naziv)
	values ('Roštilj');