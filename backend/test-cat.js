const category = "Bakery/Cake Shop";
const searchTerm = category.trim();
const searchSpaceless = searchTerm.replace(/\s+/g, '');
const searchParts = searchTerm.split(/[\/\s-]+/).filter(t => t.length > 2);
const catTerm = `%${searchTerm}%`;
const catSpTerm = `%${searchSpaceless}%`;
let catConditionParts = [
    `COALESCE(d.shop_categories, '') LIKE ?`, `REPLACE(COALESCE(d.shop_categories, ''), ' ', '') LIKE ?`,
    `COALESCE(d.category_1, '') LIKE ?`, `REPLACE(COALESCE(d.category_1, ''), ' ', '') LIKE ?`,
    `COALESCE(d.category_2, '') LIKE ?`, `REPLACE(COALESCE(d.category_2, ''), ' ', '') LIKE ?`,
    `COALESCE(d.category_3, '') LIKE ?`, `REPLACE(COALESCE(d.category_3, ''), ' ', '') LIKE ?`,
    `COALESCE(d.dukaan_name, '') LIKE ?`, `REPLACE(COALESCE(d.dukaan_name, ''), ' ', '') LIKE ?`,
    `COALESCE(d.dukaan_desc, '') LIKE ?`, `REPLACE(COALESCE(d.dukaan_desc, ''), ' ', '') LIKE ?`,
    `EXISTS (SELECT 1 FROM dukaan_products dp WHERE dp.shop_id = d.id AND (COALESCE(dp.prod_name, '') LIKE ? OR REPLACE(COALESCE(dp.prod_name, ''), ' ', '') LIKE ?))`
];
const catParams = [
    catTerm, catSpTerm,
    catTerm, catSpTerm,
    catTerm, catSpTerm,
    catTerm, catSpTerm,
    catTerm, catSpTerm,
    catTerm, catSpTerm,
    catTerm, catSpTerm
];
searchParts.forEach(part => {
    const partTerm = `%${part}%`;
    catConditionParts.push(`COALESCE(d.shop_categories, '') LIKE ?`, `COALESCE(d.category_1, '') LIKE ?`, `COALESCE(d.category_2, '') LIKE ?`, `COALESCE(d.category_3, '') LIKE ?`, `COALESCE(d.dukaan_name, '') LIKE ?`, `COALESCE(d.dukaan_desc, '') LIKE ?`, `EXISTS (SELECT 1 FROM dukaan_products dp WHERE dp.shop_id = d.id AND COALESCE(dp.prod_name, '') LIKE ?)`);
    catParams.push(partTerm, partTerm, partTerm, partTerm, partTerm, partTerm, partTerm);
});

// simulate DB lookup
let categoryIds = [46];
if (categoryIds.length > 0) {
    categoryIds.forEach(id => {
        catConditionParts.push(`FIND_IN_SET(?, REPLACE(COALESCE(d.shop_categories, ''), ' ', ''))`);
        catParams.push(id.toString());
    });
}

console.log(catConditionParts.join(' OR \n'));
console.log(catParams);
