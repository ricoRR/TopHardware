/* eslint-disable react-hooks/rules-of-hooks */
"use client"
import AllArticle from '@/components/allArticle';
import DisplayArticle from '@/components/displayArticle';
import { ArticleType, categorie } from '@/types';
import axios from 'axios';
import React, { useEffect, useState } from 'react'
import { debounce } from "lodash"

const page = () => {
    const [categories,setCategories]= useState<categorie[]>()
    const [composants,setComposants]= useState<ArticleType[]>()
    const [search,setSearch]= useState<string>()
    const [select,setSelect]= useState<string>()

    const api = axios.create({
        baseURL: 'http://localhost:8000/'
      });


      
         

      const fetchCategories = async () => {
        try {
          const response = await api.get(`categorie`);
          const data = await response.data;
          setCategories(data);
        } catch (error) {
          console.error("Error categories:", error);
        }} 
        
        

        const fetchOneCategorie = async (id:string) => {
                try {
                    const response = await api.get(`categorie_id/${id}`);
                    const data = await response.data;
                    setComposants(data)
                  } catch (error) {
                    console.error("Error categories:", error);
                  }
            }   



         const fetchComposants = async () => {
        try {
          const response = await api.get("composants");
          const data = await response.data;
          setComposants(data);
        } catch (error) {
          console.error("Error categories:", error);
        }}
      
      const searchArticle = async (q:string) => {
        try {
          const response = await api.get(`composants_search?q=${q}`);
          const data = await response.data;
        if(!data){
            setComposants([])
        }else{
            setComposants(data)
        }

        } catch (error) {
          console.error("Error categories:", error);
        }
      }; 
      
      const searchArticleWithCategorie = async (q:string,categorieId:string) => {
        try {
          const response = await api.get(`/composants_search_categorie?q=${q}&c=${categorieId}`);
          const data = await response.data;
        
        if(!data){
            setComposants([])
        }else{
            setComposants(data)
        }

        } catch (error) {
          console.error("Error categories:", error);
        }
      };


      useEffect(() => {
        fetchCategories();
        fetchComposants();
      }, []); 
      
      
      useEffect(() => {
        console.log(select,"select")
        if(search && select && select!=="no categorie"){
            console.log(search ,' in the search')
            searchArticleWithCategorie(search,select);
        }else if(search){
            searchArticle(search);
        }else if(select==="no categorie"){
            fetchComposants()
        }else if(select){
            fetchOneCategorie(select)
        }else{
            fetchComposants();
        }
      }, [search,select]);

      async function handleChange(e: React.ChangeEvent<HTMLInputElement>) {
        debouncedSearch(e.target.value)
      }

      const debouncedSearch = React.useRef(
        debounce(async (search:string) => {
          setSearch(search);
        }, 300)
      ).current;
    

      
    
  return (
    <div className='flex flex-col '>
            <div>
                <label htmlFor="categorie" className="block text-sm font-medium leading-6 text-gray-900">
                Search
                </label>
                <div className="relative mt-2 rounded-md shadow-sm">
                    <div className="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <span className="text-gray-500 sm:text-sm">-_-</span>
                    </div>
                    <input
                        id="search"
                        name="search"
                        type="text"
                        onChange={handleChange}
                        placeholder="0.00"
                        className="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    />
                <div className="absolute inset-y-0 right-0 flex items-center">
                    <label htmlFor="categorie" className="sr-only">
                    Categorie
                    </label>
                    <select
                    onChange={(e)=>{
                        setSelect(e.target.value)
                    }}
                    id="categorie"
                    name="categorie"
                    className="h-full rounded-md border-0 bg-transparent py-0 pl-2 pr-7 text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm"
                    >   <option>no categorie</option>
                        {
                        categories &&  categories?.map((categorie,i)=>{
                                return <option key={i} value={categorie.id}>{categorie.name}</option>

                            })
                        }
                    
                    </select>
                </div>
            </div>
        </div>

        
        <DisplayArticle Articles={composants? composants:[]} />
    </div>
       
  )
}

export default page
