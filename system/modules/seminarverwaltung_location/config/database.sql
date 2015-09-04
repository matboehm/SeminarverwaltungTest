---
--- tl_seminar
---

CREATE TABLE `tl_seminar` (
---
--- Ergänzungen zu V1.1.20 für Test & Training
---
---
) ENGINE=MyISAM default CHARSET=utf8;

---
--- tl_seminar
---

CREATE TABLE `tl_seminar_events` (
---
--- Ergänzungen zu V1.1.20 für Test & Training
---
---
  `location` varchar(255) NOT NULL default '',
) ENGINE=MyISAM default CHARSET=utf8;

---
--- tl_module
---

CREATE TABLE `tl_module` (
---
--- Ergänzungen zu V1.1.20 für Test & Training
---
---
  `sv_seminarlocation_template` varchar(32) NOT NULL default '',
  `sv_jumpTo_location` int(10) unsigned NOT NULL default '0',
) ENGINE=MyISAM default CHARSET=utf8;

---
--- tl_member
---

CREATE TABLE `tl_member` (
---
--- Ergänzungen zu V1.1.20 für Test & Training
---
---
) ENGINE=MyISAM default CHARSET=utf8;
