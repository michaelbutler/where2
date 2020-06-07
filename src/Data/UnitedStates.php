<?php

/*
 * This file is part of michaelbutler/where2.
 * Source: https://github.com/michaelbutler/where2
 *
 * (c) Michael Butler <michael@butlerpc.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file named LICENSE.
 */

namespace Where2\Data;

class UnitedStates
{
    /** @var string[] Map of state name => state code. And "territories" too ^_^ */
    const STATE_LIST_FLIPPED = [
        'ALABAMA' => 'AL',
        'ALASKA' => 'AK',
        'AMERICAN SAMOA' => 'AS',
        'ARIZONA' => 'AZ',
        'ARKANSAS' => 'AR',
        'ARMED FORCES - EUROPE' => 'AE',
        'ARMED FORCES - PACIFIC' => 'AP',
        'ARMED FORCES - USA/CANADA' => 'AA',
        'CALIFORNIA' => 'CA',
        'COLORADO' => 'CO',
        'CONNECTICUT' => 'CT',
        'DELAWARE' => 'DE',
        'DISTRICT OF COLUMBIA' => 'DC',
        'FEDERATED STATES OF MICRONESIA' => 'FM',
        'FLORIDA' => 'FL',
        'GEORGIA' => 'GA',
        'GUAM' => 'GU',
        'HAWAII' => 'HI',
        'IDAHO' => 'ID',
        'ILLINOIS' => 'IL',
        'INDIANA' => 'IN',
        'IOWA' => 'IA',
        'KANSAS' => 'KS',
        'KENTUCKY' => 'KY',
        'LOUISIANA' => 'LA',
        'MAINE' => 'ME',
        'MARSHALL ISLANDS' => 'MH',
        'MARYLAND' => 'MD',
        'MASSACHUSETTS' => 'MA',
        'MICHIGAN' => 'MI',
        'MINNESOTA' => 'MN',
        'MISSISSIPPI' => 'MS',
        'MISSOURI' => 'MO',
        'MONTANA' => 'MT',
        'NEBRASKA' => 'NE',
        'NEVADA' => 'NV',
        'NEW HAMPSHIRE' => 'NH',
        'NEW JERSEY' => 'NJ',
        'NEW MEXICO' => 'NM',
        'NEW YORK' => 'NY',
        'NORTH CAROLINA' => 'NC',
        'NORTH DAKOTA' => 'ND',
        'OHIO' => 'OH',
        'OKLAHOMA' => 'OK',
        'OREGON' => 'OR',
        'PENNSYLVANIA' => 'PA',
        'PUERTO RICO' => 'PR',
        'RHODE ISLAND' => 'RI',
        'SOUTH CAROLINA' => 'SC',
        'SOUTH DAKOTA' => 'SD',
        'TENNESSEE' => 'TN',
        'TEXAS' => 'TX',
        'UTAH' => 'UT',
        'VERMONT' => 'VT',
        'VIRGIN ISLANDS' => 'VI',
        'VIRGINIA' => 'VA',
        'WASHINGTON' => 'WA',
        'WEST VIRGINIA' => 'WV',
        'WISCONSIN' => 'WI',
        'WYOMING' => 'WY',
    ];

    /** @var string[] Map of state code => state name. And "territories" too ^_^ */
    const STATE_LIST = [
        'AL' => 'ALABAMA',
        'AK' => 'ALASKA',
        'AS' => 'AMERICAN SAMOA',
        'AZ' => 'ARIZONA',
        'AR' => 'ARKANSAS',
        'AE' => 'ARMED FORCES - EUROPE',
        'AP' => 'ARMED FORCES - PACIFIC',
        'AA' => 'ARMED FORCES - USA/CANADA',
        'CA' => 'CALIFORNIA',
        'CO' => 'COLORADO',
        'CT' => 'CONNECTICUT',
        'DE' => 'DELAWARE',
        'DC' => 'DISTRICT OF COLUMBIA',
        'FM' => 'FEDERATED STATES OF MICRONESIA',
        'FL' => 'FLORIDA',
        'GA' => 'GEORGIA',
        'GU' => 'GUAM',
        'HI' => 'HAWAII',
        'ID' => 'IDAHO',
        'IL' => 'ILLINOIS',
        'IN' => 'INDIANA',
        'IA' => 'IOWA',
        'KS' => 'KANSAS',
        'KY' => 'KENTUCKY',
        'LA' => 'LOUISIANA',
        'ME' => 'MAINE',
        'MH' => 'MARSHALL ISLANDS',
        'MD' => 'MARYLAND',
        'MA' => 'MASSACHUSETTS',
        'MI' => 'MICHIGAN',
        'MN' => 'MINNESOTA',
        'MS' => 'MISSISSIPPI',
        'MO' => 'MISSOURI',
        'MT' => 'MONTANA',
        'NE' => 'NEBRASKA',
        'NV' => 'NEVADA',
        'NH' => 'NEW HAMPSHIRE',
        'NJ' => 'NEW JERSEY',
        'NM' => 'NEW MEXICO',
        'NY' => 'NEW YORK',
        'NC' => 'NORTH CAROLINA',
        'ND' => 'NORTH DAKOTA',
        'OH' => 'OHIO',
        'OK' => 'OKLAHOMA',
        'OR' => 'OREGON',
        'PA' => 'PENNSYLVANIA',
        'PR' => 'PUERTO RICO',
        'RI' => 'RHODE ISLAND',
        'SC' => 'SOUTH CAROLINA',
        'SD' => 'SOUTH DAKOTA',
        'TN' => 'TENNESSEE',
        'TX' => 'TEXAS',
        'UT' => 'UTAH',
        'VT' => 'VERMONT',
        'VI' => 'VIRGIN ISLANDS',
        'VA' => 'VIRGINIA',
        'WA' => 'WASHINGTON',
        'WV' => 'WEST VIRGINIA',
        'WI' => 'WISCONSIN',
        'WY' => 'WYOMING',
    ];

    /** @var string Partial Regex for most common street abbreviations */
    const COMMON_STREET_ABBR = 'ST|AVE|RD|DR|BLVD|CTR|CIR|CT|LN|PKWY|HWY';

    const STREET_SUFFIXES = [
        'AIR' => 'AIR',
        'AR' => 'AIR',
        'ALLEE' => 'ALY',
        'ALLEY' => 'ALY',
        'ALLY ' => 'ALY',
        'ALPINE' => 'ALPINE',
        'ALP' => 'ALPINE',
        'APINE' => 'ALPINE',
        'ALPN' => 'ALPINE',
        'ANEX ' => 'ANX',
        'ANNEX' => 'ANX',
        'ANNX' => 'ANX',
        'ARCADE' => 'ARC',
        'AV' => 'AVE',
        'AVEN' => 'AVE',
        'AVENU' => 'AVE',
        'AVENUE' => 'AVE',
        'AVN' => 'AVE',
        'AVNUE' => 'AVE',
        'BAYOO' => 'BYU',
        'BAYOU' => 'BYU',
        'BEACH' => 'BCH',
        'BEND' => 'BND',
        'BLUF' => 'BLF',
        'BLUFF' => 'BLF',
        'BLUFFS' => 'BLFS',
        'BOT' => 'BTM',
        'BOTTM' => 'BTM',
        'BOTTOM' => 'BTM',
        'BOUL' => 'BLVD',
        'BOULEVARD' => 'BLVD',
        'BV' => 'BLVD',
        'BOULV' => 'BLVD',
        'BRANCH' => 'BR',
        'BRDGE' => 'BRG',
        'BRIDGE' => 'BRG',
        'BRNCH' => 'BR',
        'BROOK' => 'BRK',
        'BROOKS' => 'BRKS',
        'BURG' => 'BG',
        'BURGS' => 'BGS',
        'BYPA' => 'BYP',
        'BYPAS' => 'BYP',
        'BYPASS' => 'BYP',
        'BYPS' => 'BYP',
        'CAMP' => 'CP',
        'CANYN' => 'CYN',
        'CANYON' => 'CYN',
        'CAPE' => 'CPE',
        'CAUSEWAY' => 'CSWY',
        'CAUSWAY ' => 'CSWY',
        'CEN' => 'CTR',
        'CENT' => 'CTR',
        'CENTER' => 'CTR',
        'CENTERS' => 'CTRS',
        'CENTR' => 'CTR',
        'CENTRE' => 'CTR',
        'CIRC' => 'CIR',
        'CIRCL' => 'CIR',
        'CIRCLE' => 'CIR',
        'CIRCLES' => 'CIRS',
        'CK' => 'CRK',
        'CLIFF' => 'CLF',
        'CLIFFS' => 'CLFS',
        'CLUB' => 'CLB',
        'CMP' => 'CP',
        'CNTER' => 'CTR',
        'CNTR' => 'CTR',
        'CNYN' => 'CYN',
        'COMMON' => 'CMN',
        'CORNER' => 'COR',
        'CORNERS' => 'CORS',
        'COURSE' => 'CRSE',
        'COURT' => 'CT',
        'COURTS' => 'CTS',
        'COVE' => 'CV',
        'COVES' => 'CVS',
        'CR' => 'CRK',
        'CRCL' => 'CIR',
        'CRCLE' => 'CIR',
        'CRECENT' => 'CRES',
        'CREEK' => 'CRK',
        'CRESCENT' => 'CRES',
        'CRESENT' => 'CRES',
        'CREST' => 'CRST',
        'CROSSING' => 'XING',
        'CROSSROAD' => 'XRD',
        'CRSCNT' => 'CRES',
        'CRSENT' => 'CRES',
        'CRSNT' => 'CRES',
        'CRSSING' => 'XING',
        'CRSSNG' => 'XING',
        'CRT' => 'CT',
        'CURVE' => 'CURV',
        'DALE' => 'DL',
        'DAM' => 'DM',
        'DIV' => 'DV',
        'DIVIDE' => 'DV',
        'DRIV' => 'DR',
        'DRIVE' => 'DR',
        'DRIVES' => 'DRS',
        'DRV' => 'DR',
        'DVD' => 'DV',
        'ESTATE' => 'EST',
        'ESTATES' => 'ESTS',
        'EXP' => 'EXPY',
        'EXPR' => 'EXPY',
        'EXPRESS' => 'EXPY',
        'EXPRESSWAY' => 'EXPY',
        'EXPW' => 'EXPY',
        'EXTENSION' => 'EXT',
        'EXTENSIONS' => 'EXTS',
        'EXTN' => 'EXT',
        'EXTNSN' => 'EXT',
        'FARM' => 'FARMS',
        'FARMS' => 'FARMS',
        'FRM' => 'FARMS',
        'FRMS' => 'FARMS',
        'FALLS' => 'FLS',
        'FERRY' => 'FRY',
        'FIELD' => 'FLD',
        'FIELDS' => 'FLDS',
        'FLAT' => 'FLT',
        'FLATS' => 'FLTS',
        'FORD' => 'FRD',
        'FORDS' => 'FRDS',
        'FOREST' => 'FRST',
        'FORESTS' => 'FRST',
        'FORG' => 'FRG',
        'FORGE' => 'FRG',
        'FORGES' => 'FRGS',
        'FORK' => 'FRK',
        'FORKS' => 'FRKS',
        'FORT' => 'FT',
        'FREEWAY' => 'FWY',
        'FREEWY' => 'FWY',
        'FRRY' => 'FRY',
        'FRT' => 'FT',
        'FRWAY' => 'FWY',
        'FRWY' => 'FWY',
        'GARDEN' => 'GDN',
        'GRANDE' => 'GRANDE',
        'GRND' => 'GRANDE',
        'GRAND' => 'GRANDE',
        'GND' => 'GRANDE',
        'GARDENS' => 'GDNS',
        'GARDN' => 'GDN',
        'GATEWAY' => 'GTWY',
        'GATEWY' => 'GTWY',
        'GATWAY' => 'GTWY',
        'GLEN' => 'GLN',
        'GLENS' => 'GLNS',
        'GRDEN' => 'GDN',
        'GRDN' => 'GDN',
        'GRDNS' => 'GDNS',
        'GREEN' => 'GRN',
        'GREENS' => 'GRNS',
        'GROV' => 'GRV',
        'GROVE' => 'GRV',
        'GROVES' => 'GRVS',
        'GTWAY' => 'GTWY',
        'HARB' => 'HBR',
        'HARBOR' => 'HBR',
        'HARBORS' => 'HBRS',
        'HARBR' => 'HBR',
        'HAVEN' => 'HVN',
        'HAVN' => 'HVN',
        'HEIGHT' => 'HTS',
        'HEIGHTS' => 'HTS',
        'HGTS' => 'HTS',
        'HIGHWAY' => 'HWY',
        'HIGHWY' => 'HWY',
        'HILL' => 'HL',
        'HILLS' => 'HLS',
        'HIWAY' => 'HWY',
        'HIWY' => 'HWY',
        'HLLW' => 'HOLW',
        'HOLLOW' => 'HOLW',
        'HOLLOWS' => 'HOLW',
        'HOLWS' => 'HOLW',
        'HRBOR' => 'HBR',
        'HT' => 'HTS',
        'HWAY' => 'HWY',
        'INLET' => 'INLT',
        'ISLAND ' => 'IS',
        'ISLANDS' => 'ISS',
        'ISLES' => 'ISLE',
        'ISLND' => 'IS',
        'ISLNDS' => 'ISS',
        'JCTION' => 'JCT',
        'JCTN' => 'JCT',
        'JCTNS' => 'JCTS',
        'JUNCTION' => 'JCT',
        'JUNCTIONS' => 'JCTS',
        'JUNCTN' => 'JCT',
        'JUNCTON' => 'JCT',
        'KEY' => 'KY',
        'KEYS' => 'KYS',
        'KNOL' => 'KNL',
        'KNOLL' => 'KNL',
        'KNOLLS' => 'KNLS',
        'LA' => 'LN',
        'LAKE' => 'LK',
        'LAKES' => 'LKS',
        'LANDING' => 'LNDG',
        'LANE' => 'LN',
        'LANES' => 'LN',
        'LDGE' => 'LDG',
        'LIGHT' => 'LGT',
        'LIGHTS' => 'LGTS',
        'LNDNG' => 'LNDG',
        'LOAF' => 'LF',
        'LOCK' => 'LCK',
        'LOCKS' => 'LCKS',
        'LODG' => 'LDG',
        'LODGE' => 'LDG',
        'LOOP' => 'LP',
        'LOOPS' => 'LP',
        'MANOR' => 'MNR',
        'MANORS' => 'MNRS',
        'MEADOW' => 'MDW',
        'MEADOWS' => 'MDWS',
        'MEDOWS' => 'MDWS',
        'MILL' => 'ML',
        'MILLS' => 'MLS',
        'MISSION' => 'MSN',
        'MISSN' => 'MSN',
        'MNT' => 'MT',
        'MNTAIN' => 'MTN',
        'MNTN' => 'MTN',
        'MNTNS' => 'MTNS',
        'MOTORWAY' => 'MTWY',
        'MOUNT' => 'MT',
        'MOUNTAIN' => 'MTN',
        'MOUNTAINS' => 'MTNS',
        'MOUNTIN' => 'MTN',
        'MSSN' => 'MSN',
        'MTIN' => 'MTN',
        'NECK' => 'NCK',
        'ORCHARD' => 'ORCH',
        'ORCHRD' => 'ORCH',
        'OVERPASS' => 'OPAS',
        'OVL' => 'OVAL',
        'PARKS' => 'PARK',
        'PARKWAY' => 'PKWY',
        'PARKWAYS' => 'PKWY',
        'PARKWY' => 'PKWY',
        'PASSAGE' => 'PSGE',
        'PATHS' => 'PATH',
        'PIKES' => 'PIKE',
        'PINE' => 'PNE',
        'PINES' => 'PNES',
        'PK' => 'PARK',
        'PKWAY' => 'PKWY',
        'PKWYS' => 'PKWY',
        'PKY' => 'PKWY',
        'PLACE' => 'PL',
        'PLAIN' => 'PLN',
        'PLAINES' => 'PLNS',
        'PLAINS' => 'PLNS',
        'PLAZA' => 'PLZ',
        'PLZA' => 'PLZ',
        'POINT' => 'PT',
        'POINTS' => 'PTS',
        'PORT' => 'PRT',
        'PORTS' => 'PRTS',
        'PRAIRIE' => 'PR',
        'PRARIE' => 'PR',
        'PRK' => 'PARK',
        'PRR' => 'PR',
        'QUARRY' => 'QUARRY',
        'QRY' => 'QUARRY',
        'QUARY' => 'QUARRY',
        'QUARRYS' => 'QUARRY',
        'QURRY' => 'QUARRY',
        'QRRY' => 'QUARRY',
        'QARY' => 'QUARRY',
        'RAD' => 'RADL',
        'RADIAL' => 'RADL',
        'RADIEL' => 'RADL',
        'RANCH' => 'RNCH',
        'RAVEN' => 'RAVEN',
        'RVN' => 'RAVEN',
        'RVEN' => 'RAVEN',
        'RAVN' => 'RAVEN',
        'RV' => 'RAVEN',
        'RANCHES' => 'RNCH',
        'RAPID' => 'RPD',
        'RAPIDS' => 'RPDS',
        'RDGE' => 'RDG',
        'REST' => 'RST',
        'RIDGE' => 'RDG',
        'RIDGES' => 'RDGS',
        'RIVER' => 'RIV',
        'RIVR' => 'RIV',
        'RNCHS' => 'RNCH',
        'ROAD' => 'RD',
        'ROADS' => 'RDS',
        'ROCK' => 'ROCK',
        'RCK' => 'ROCK',
        'RK' => 'ROCK',
        'ROUTE' => 'RTE',
        'RVR' => 'RIV',
        'SHOAL' => 'SHL',
        'SHOALS' => 'SHLS',
        'SHOAR' => 'SHR',
        'SHOARS' => 'SHRS',
        'SAGE' => 'SAGE',
        'SGE' => 'SAGE',
        'SAG' => 'SAGE',
        'SG' => 'SAGE',
        'SHORE' => 'SHR',
        'SHORES' => 'SHRS',
        'SKYWAY' => 'SKWY',
        'SPNG' => 'SPG',
        'SPNGS' => 'SPGS',
        'SPRING' => 'SPG',
        'SPRINGS' => 'SPGS',
        'SPRNG' => 'SPG',
        'SPRNGS' => 'SPGS',
        'SPURS' => 'SPUR',
        'SQR' => 'SQ',
        'SQRE' => 'SQ',
        'SQRS' => 'SQS',
        'SQU' => 'SQ',
        'SQUARE' => 'SQ',
        'SQUARES' => 'SQS',
        'STATION' => 'STA',
        'STATN' => 'STA',
        'STN' => 'STA',
        'STR' => 'ST',
        'STRAV' => 'STRA',
        'STRAVE' => 'STRA',
        'STRAVEN' => 'STRA',
        'STRAVENUE' => 'STRA',
        'STRAVN' => 'STRA',
        'STREAM' => 'STRM',
        'STREET' => 'ST',
        'STREETS' => 'STS',
        'STREME' => 'STRM',
        'STRT' => 'ST',
        'STRVN' => 'STRA',
        'STRVNUE' => 'STRA',
        'SLEEP' => 'SLEEP',
        'SLP' => 'SLEEP',
        'SLEP' => 'SLEEP',
        'SP' => 'SLEEP',
        'SUMIT' => 'SMT',
        'SUMITT' => 'SMT',
        'SUMMIT' => 'SMT',
        'TEN' => 'TEN',
        'TN' => 'TEN',
        'TERR' => 'TER',
        'TERRACE' => 'TER',
        'THROUGHWAY' => 'TRWY',
        'TPK' => 'TPKE',
        'TR' => 'TRL',
        'TRACE' => 'TRCE',
        'TRACES' => 'TRCE',
        'TRACK' => 'TRAK',
        'TRACKS' => 'TRAK',
        'TRAFFICWAY' => 'TRFY',
        'TRAIL' => 'TRL',
        'TRAILS' => 'TRL',
        'TRK' => 'TRAK',
        'TRKS' => 'TRAK',
        'TRLS' => 'TRL',
        'TRNPK' => 'TPKE',
        'TRPK' => 'TPKE',
        'TUNEL' => 'TUNL',
        'TUNLS' => 'TUNL',
        'TUNNEL' => 'TUNL',
        'TUNNELS' => 'TUNL',
        'TUNNL' => 'TUNL',
        'TURNPIKE' => 'TPKE',
        'TURNPK' => 'TPKE',
        'UNDERPASS' => 'UPAS',
        'UNION' => 'UN',
        'UNIONS' => 'UNS',
        'VALLEY' => 'VLY',
        'VALLEYS' => 'VLYS',
        'VALLY' => 'VLY',
        'VDCT' => 'VIA',
        'VIADCT' => 'VIA',
        'VIADUCT' => 'VIA',
        'VIEW' => 'VW',
        'VIEWS' => 'VWS',
        'VILL' => 'VLG',
        'VILLAG' => 'VLG',
        'VILLAGE' => 'VLG',
        'VILLAGES' => 'VLGS',
        'VILLE' => 'VL',
        'VILLG' => 'VLG',
        'VILLIAGE' => 'VLG',
        'VIST' => 'VIS',
        'VISTA' => 'VIS',
        'VLLY' => 'VLY',
        'VST' => 'VIS',
        'VSTA' => 'VIS',
        'WALKS' => 'WALK',
        'WELL' => 'WL',
        'WELLS' => 'WLS',
        'WY' => 'WAY',
    ];
}