// Trae id de categoria con su nombre y id de marca con su nombre
SELECT cm.tb_categoria_id_Categoria,c.nom_categoria,cm.tb_marca_id_Marca,m.nom_marca FROM tb_categoria_has_tb_marca cm
join tb_categoria c on c.id_Categoria=cm.tb_categoria_id_Categoria
join tb_marca m on m.id_Marca=cm.tb_marca_id_Marca where cm.tb_categoria_id_Categoria=1

// Trae id de categoria con su nombre y id de talla con su nombre
SELECT ct.tb_categoria_id_Categoria,c.nom_categoria,ct.tb_tallas_idtallas,t.nombre FROM tb_categoria_has_tb_tallas ct
join tb_categoria c on c.id_Categoria=ct.tb_categoria_id_Categoria
join tb_tallas t on t.idtallas=ct.tb_tallas_idtallas
