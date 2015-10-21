 select distinct fldDays,fldStart,fldStop from tblSections join tblTeachers on fnkTeacherNetId = pmkNetId where fldFirstName ='Robert Raymond' and fldLastName ='Snapp' order by fldStart;

 select distinct fldDays,fldStart,fldStop from tblSections join tblTeachers on fnkTeacherNetId = pmkNetId where fldFirstName ="Robert Raymond" and fldLastName ="Snapp" order by fldStart
