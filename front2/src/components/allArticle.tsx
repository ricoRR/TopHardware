/* eslint-disable react/jsx-key */
"use client"
import React, { useState, useEffect } from 'react';
import Link from 'next/link';
import Article from '@/components/article';
import { ArticleType, categorie } from '@/types';
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue,
} from "@/components/ui/select"
import { Input } from './ui/input';
import { shippo } from '@/utils/instance';

const AllArticle = () => {
  const [Composants, setComposants] = useState<ArticleType[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string>("");
  const [select, setSelect] = useState<string>('filter');
  const [categorie, setCategorie] = useState<string>("No Categorie");
  const [search, setSearch] = useState<string>("");



  useEffect(() => {

    fetch('http://localhost:8000/composants')
      .then(response => {
        if (!response.ok) {
          throw new Error('Network not ok');
        }
        return response.json();
      })
      .then(data => {
        console.log(data,"in the all article")
        setComposants(data);
        setLoading(false);
      })
      .catch(error => {
        setError('Error :'+ error.message );
        setLoading(false);
      });
      
  }, []);


  console.log(Composants,"in the all article")


  // const select_hand = (event: React.ChangeEvent<HTMLSelectElement>) => {
  //   setSelect(event.target.value);
  // };

 
  if (loading) return <div className="text-center mt-8">Loading...</div>;
  if (error) return <div className="text-center mt-8 text-red-500">{error}</div>;

  let articles_pop = Composants;
  
  if (select == 'pop') {
    articles_pop = [...Composants].sort((a, b) => b.views - a.views);
  }


  let listcategorie =  Composants.map((comp:ArticleType)=>{
          
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
    <div className="bg-white">
    <div className="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
      <h2 className="sr-only">Products</h2>

      <div className='flex flex-row w-full justify-start gap-4'>

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


      </div>
       
      
      <div className="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
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
                <Article stripeid={product.stripeid} price={product.price} name={product.name} pp={product.pp} views={product.views} onAddToCart={function (): void {
                  throw new Error('Function not implemented.');
              } } />
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
            <Link key={product.id} href={`/composants/${product.id}`} >
               <Article stripeid={product.stripeid} price={product.price} name={product.name} pp={product.pp} views={product.views} onAddToCart={function (): void {
              throw new Error('Function not implemented.');
          } } />
            </Link>
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
                <Article stripeid={product.stripeid} price={product.price} name={product.name} pp={product.pp} views={product.views} onAddToCart={function (): void {
                  throw new Error('Function not implemented.');
              } } />
              )
             
            }
            
          })}
          </>
          
          ||
          <>
            {articles_pop.map((product) => (
            <Link key={product.id} href={`/composants/${product.id}`} >
               <Article stripeid={product.stripeid} price={product.price} name={product.name} pp={product.pp} views={product.views} onAddToCart={function (): void {
              throw new Error('Function not implemented.');
          } } />
            </Link>
          ))}
          </>
        
          
        }
          </>
        }
    
        
      </div>
    </div>
  </div>
  );
}


export default AllArticle;