delimiter //
create function WriteScript (doctor_id varchar(45), 
patient_id varchar(45), medication_id int(11), 
condition_id int(11), pharmacy_id int(11)) returns int 
begin
	
	declare errorcode int;
    set errorcode = 0;
    
	if (medication_id in 
    
    (select a.medication_id from patient_allergy as p
    inner join allergy as a on p.allergy_id = a.allergy_id
	where p.patient_id = patient_id)  
    
	then set errorcode = 1;
    
    else 
    
        insert into prescription values
		(rand()* 1000000, patient_id, medication_id, condition_id, 
        doctor_id, pharmacy_id, curdate(), null, 'unfilled');
  
    end if;

return errorcode;
end //
delimiter;
