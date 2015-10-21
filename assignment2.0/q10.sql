select distinct fldBuilding, count(fldNumStudents), fldDays from tblSections where fldDays like "%F%" group by fldBuilding order by count(fldNumStudents) desc;

