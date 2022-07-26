// Com arrays simples
let foo = [1, 2, 3, 4, 5, 6, 7, 8, 9];
let foo2 = [4, 5, 6, 7, 8, 99];

console.log(foo)
console.log(foo2)

// Array Function que sobrescreve lista "foo" com uma nova lista sem os elementos repetidos dos existentes na lista "foo2"
foo = foo.filter(item => !foo2.includes(item));

// Lista com os itens semelhantes removidos
console.log(foo)


console.log('-------------------------------Objetos-------------------------------------')

// Arrays com Objetos
let i = 0;
let obj1 = [
    { nome: 'Microondas', idade: 20 },
    { nome: 'Geladeira', idade: 13 },
    { nome: 'Fax', idade: 30 },
    { nome: 'Canudinho', idade: 27 },
    { nome: 'Paulo', idade: 18 },
]

let obj2 = [
    { nome: 'Microondas', idade: 20 },
    { nome: 'Geladeira', idade: 13 },
    { nome: 'Fax', idade: 30 },
]

console.log(obj1)
console.log(obj2)

// Mapeia a lista e executa a função em cada elemento gerando uma nova lista com os nomes
objNomes = obj1.map(obj => obj.nome);
obj2Nomes = obj2.map(obj2 => obj2.nome);
console.log(obj2Nomes);

obj1.forEach(element => {
    if (objNomes[i] === obj2Nomes[i]) {
        console.log(element)
    }
    i++;
});

// obj1 = JSON.stringify(obj1) === JSON.stringify(obj2);
// console.log(JSON.stringify(obj1));