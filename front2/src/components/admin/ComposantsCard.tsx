import { ArticleType } from '@/types'
import React, { Dispatch, SetStateAction } from 'react'
import { Article } from '../ManageComposant'
import ComposantsDialog from './ComposantsDialog';
import { Button } from '../ui/button';
import { Card } from '../ui/card';
import DialogDelete from './DialogDelete';

type artile = {
    article: Article; handleDelete: (id: number) => Promise<void>; setEditingArticle: Dispatch<SetStateAction<Article | null>>; key: number; 

}
const ComposantsCard = ({article,setEditingArticle,handleDelete}:artile) => {
  return (
    <>
    <Card  className="mb-4 p-4 flex w-full gap-4 items-center border rounded ">
         <img className=" h-48 object-contain" src={article.pp} alt={article.description} />
        <div className='flex flex-col gap-2'>
            <h2 className="text-xl font-semibold">{article.name}</h2>
            <p>Price: ${article.price}</p>
            <p>{article.description}</p>
            <div className='flex gap-4'>
                <ComposantsDialog article={article} key={article.id} edit={true} >
                    <Button
                    className="bg-yellow-500 text-white p-2 rounded mr-2"
                    >
                    Edit
                    </Button>
                </ComposantsDialog>
                <DialogDelete id={article.id} title={article.name}>
                    <Button
                    
                    className="bg-red-500 text-white p-2 rounded"
                    >
                    Delete
                    </Button>
                </DialogDelete>
                   
            </div>
            
         
        </div>
   
  </Card>
    </>

  )
}

export default ComposantsCard
