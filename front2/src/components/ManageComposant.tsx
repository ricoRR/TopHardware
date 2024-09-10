/* eslint-disable @next/next/no-img-element */
/* eslint-disable react-hooks/exhaustive-deps */
"use client"
import axios from 'axios';
import React, { useState, useEffect, ChangeEvent, FormEvent } from 'react';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from './ui/select';
import {  categorie } from '@/types';
import { Input } from './ui/input';
import ComposantsCard from './admin/ComposantsCard';
import { Button } from './ui/button';
import ComposantsDialog from './admin/ComposantsDialog';

export interface Article {
  id: number;
  type: string;
  name: string;
  price: number;
  description: string ;
  caractéristique: string;
  photo: string[] | null;
  pp: string;
  views:number;
  reduction:number
  details: string;
  amount: number;
  highlight: string[] | null;
  categorie: categorie;
}

type ArticleType = {
  id: number;
  type: string;
  name: string;
  price: number;
  description: string ;
  caractéristique: string;
  photo: string[] | null;
  pp: string;
  reduction:number
  details: string;
  amount: number;
  highlight: string[] | null;
  categorie: categorie;
}

interface Props{
  token:string
}

type ArticleInput = Omit<Article, 'id'>;

const ComposantsList: React.FC<Props> = ({token}) => {
  const [Composants, setComposants] = useState<Article[]>([]);
  const [select, setSelect] = useState<string>('filter');
  const [categorie, setCategorie] = useState<string>("No Categorie");
  const [search, setSearch] = useState<string>("");

  const [editingArticle, setEditingArticle] = useState<Article | null>(null);
  const [newArticle, setNewArticle] = useState<ArticleInput>({
    type: '',
    name: '',
    price: 0,
    description: '',
    caractéristique: '',
    photo: [],
    pp: '',
    views:0,

    reduction:0,
    details: '',
    amount: 0,
    highlight: [],
    categorie:  {id:"dedede",name:"daada"},
  });

  useEffect(() => {
    fetchComposants();
  }, []);

  const api = axios.create({
    baseURL: 'http://localhost:8000/',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${token}`
    }
  });


  
  const fetchComposants = async () => {
    const response = await api.get<Article[]>('composants');

    setComposants(response.data);
  };  


  console.log(Composants)



  const handleInputChange = (e: ChangeEvent<HTMLInputElement | HTMLTextAreaElement>, article: Article | null = null) => {
    const { name, value } = e.target;
    if (article) {
      setEditingArticle({ ...article, [name]: value });
    } else {
      setNewArticle({ ...newArticle, [name]: value });
    }
  };

  const handleSubmit = async (e: FormEvent) => {
    e.preventDefault();
    if (editingArticle) {
      await api.put(`api/composants/${editingArticle.id}`, editingArticle);
    } else {
      await api.post('api/composants', newArticle);
    }
    fetchComposants();
    setEditingArticle(null);
    setNewArticle({
      type: '',
      name: '',
      price: 0,
      description: '',
      caractéristique: '',
      photo: [],
      pp: '',
      views:0,
      details: '',
      reduction:0,
      amount: 0,
      highlight: [],
      categorie: {id:"adadada",name:"dadad"},
    });
  };

  const handleDelete = async (id: number) => {
    await api.delete(`api/composants/${id}`);
    fetchComposants();
  };


  let articles_pop = Composants;
  
  if (select == 'pop') {
    articles_pop = [...Composants].sort((a, b) => b.views - a.views);
  }

  let listcategorie =  Composants.map((comp:any)=>{
          
    if( comp.categorie){
      return  comp.categorie.name

    }
  }).map((cat)=>{
    return cat 
  })


   listcategorie = listcategorie.filter(function(ele, pos) {
    return listcategorie.indexOf(ele) == pos;
  })


  return (
    <div className="container mx-auto p-4">
      <h1 className="text-2xl font-bold mb-4">Composants</h1>

      <div className='flex flex-row w-full mb-2 justify-start gap-4'>

        <Select onValueChange={setSelect}value={select} >
          <SelectTrigger  className="w-[180px]">
            <SelectValue placeholder="Theme" />
          </SelectTrigger>
          <SelectContent  >
            <SelectItem value="filter">Filter</SelectItem>
            <SelectItem value="pop">Popularity</SelectItem>
          </SelectContent>
        </Select>

        <Select onValueChange={setCategorie}value={categorie} >
          <SelectTrigger  className="w-[180px]">
            <SelectValue placeholder="Theme" />
          </SelectTrigger>
          <SelectContent  >
            <SelectItem value={"No Categorie"}>No Categorie</SelectItem>
            {
          listcategorie.map((element,index)=>{
              return <SelectItem key={element} value={element as string}>{element}</SelectItem>
          })
          }
          </SelectContent>
        </Select>

        <Input className='w-[30%]' placeholder='Search....' value={search}  onChange={(e)=>setSearch(e.target.value.toLowerCase())}/>
          <ComposantsDialog edit={false}>
          <Button>New Product</Button>

          </ComposantsDialog>
      </div>
      {/* <form onSubmit={handleSubmit} className="mb-8 flex flex-col gap-2 justify-between">
        <label htmlFor="">Name</label>
        <input
          type="text"
          name="name"
          value={editingArticle?.name || newArticle.name}
          onChange={(e) => handleInputChange(e, editingArticle)}
          placeholder="Name"
          className="border p-2 mr-2"
        />
        <label htmlFor="">Price</label>
        <input
          type="number"
          name="price"
          value={editingArticle?.price || newArticle.price}
          onChange={(e) => handleInputChange(e, editingArticle)}
          placeholder="Price"
          className="border p-2 mr-2"
        />
        <label htmlFor="">Reduction</label>
        <input
          type="number"
          name="reduction"
          value={editingArticle?.reduction || newArticle.reduction}
          onChange={(e) => handleInputChange(e, editingArticle)}
          placeholder="Price"
          className="border p-2 mr-2"
        />
        <label htmlFor="">Amount</label>
        <input
          type="number"
          name="amount"
          value={editingArticle?.amount || newArticle.amount}
          onChange={(e) => handleInputChange(e, editingArticle)}
          placeholder="Price"
          className="border p-2 mr-2"
        />
        <label htmlFor="">Description</label>
        <textarea
          name="description"
          value={editingArticle?.description || newArticle.description}
          onChange={(e) => handleInputChange(e, editingArticle)}
          placeholder="Description"
          className="border p-2 mr-2 min-h-[200px] min-w-[300px]"
        /> 
        <label htmlFor="">Caractéristique</label>
        <textarea
          name="caractéristique"
          value={editingArticle?.caractéristique || newArticle.caractéristique}
          onChange={(e) => handleInputChange(e, editingArticle)}
          placeholder="Caractéristique"
          className="border p-2 mr-2 min-h-[200px] min-w-[300px]"
        />  
        <label htmlFor="">details</label>
        <textarea
          name="details"
          value={editingArticle?.details || newArticle.details}
          onChange={(e) => handleInputChange(e, editingArticle)}
          placeholder="Details"
          className="border p-2 mr-2 min-h-[200px] min-w-[300px]"
        />
       
        <button type="submit" className="bg-blue-500 text-white p-2 rounded">
          {editingArticle ? 'Update' : 'Add'} Article
        </button>
      </form> */}
      <ul>
      {
          search ? 
          
          <>
         {
          categorie!=="No Categorie" &&  
          <>
          {articles_pop.filter((article)=>{
            return (
              article.name.toLowerCase().includes(search)

            )

           }).map((product)=>{

            if(product.categorie.name==categorie){
              return (
                <ComposantsCard article={product} handleDelete={handleDelete} setEditingArticle={setEditingArticle} key={product.id}  />
              )
             
            }
            
          })}
          </>
          
          ||
          <>
            {articles_pop.filter((article)=>{
            return (
              article.name.toLowerCase().includes(search)

            )

           }).map((product) => (
            <ComposantsCard article={product} handleDelete={handleDelete} setEditingArticle={setEditingArticle} key={product.id}  />

          ))}
          </>
        
          
        }
          
           
          </>
          : 
          <>
              {
          categorie!=="No Categorie" &&  
          <>
          {articles_pop.map((product)=>{

            if(product.categorie.name==categorie){
              return (
                <ComposantsCard article={product} handleDelete={handleDelete} setEditingArticle={setEditingArticle} key={product.id}  />

              )
             
            }
            
          })}
          </>
          
          ||
          <>
            {articles_pop.map((product) => (
            
            <ComposantsCard article={product} handleDelete={handleDelete} setEditingArticle={setEditingArticle} key={product.id}  />

          ))}
          </>
        
          
        }
          </>
        }
      </ul>
    </div>
  );
};

export default ComposantsList;