"use client"
import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { categorie } from '@/types';

const CategoryManagement = (props:{token:string}) => {
  const [categories, setCategories] = useState<categorie[]>([]);
  const [newCategoryName, setNewCategoryName] = useState('');
  const api = axios.create({
    baseURL: 'http://localhost:8000/',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${props.token}`
    }
  });

  useEffect(() => {
    fetchCategories();
  }, []);

  const fetchCategories = async () => {
    try {
      const response = await api.get("categorie");
      const data = await response.data;
      setCategories(data);
    } catch (error) {
      console.error("Error categories:", error);
    }
  };

  const addCategory = async () => {
    try {
      await api.post('api/categorie', { name: newCategoryName  });
      setNewCategoryName('');
    //   fetchCategories();
    } catch (error) {
      console.error(error)
    }
  };

  const deleteCategory = async (id:string) => {
    try {
      await api.delete(`api/categorie/${id}`);
      fetchCategories();
    } catch (error) {
        console.error(error)
    }
  };

  return (
    <div className="p-6 max-w-lg mx-auto bg-white rounded-xl shadow-md">
      <h1 className="text-2xl font-bold mb-4">Category Management</h1>
      
    
      
    
      <form onSubmit={(e)=>{
        e.preventDefault
        addCategory()
      }} className="mb-6">
        <input
          type="text"
          value={newCategoryName}
          onChange={(e) => setNewCategoryName(e.target.value)}
          placeholder="New category name"
          className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        />
        <button 
          type="submit" 
          className="mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
        >
          Add Category
        </button>
      </form>
      
      <ul className="divide-y divide-gray-200">
        {categories.map((category) => (
          <li key={category.id} className="py-4 flex items-center justify-between">
            <span className="text-lg">{category.name}</span>
            <button
              onClick={() => deleteCategory(category.id)}
              className="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            >
              Delete
            </button>
          </li>
        ))}
      </ul>
    </div>
  );
};

export default CategoryManagement;