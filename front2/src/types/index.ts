import z from "zod"





        export const SchemaLogin = z.object({
            username: z.string().min(1,{ message: 'need a username' }),
            password: z.string().min(6, { message: 'at least 6 characters long' })
            ,
          });
          
          export interface FormDataRegister {
            email: string;
            password: string;
            username: string;
          }
          
          
          
          export const schemaProfile = z.object({
            firstname: z.string().min(1, { message: 'cant be empty' }),
            lastname: z.string().min(1, { message: 'cant be empty' }),
            email: z.string().email({ message: 'Invalid email format' }),
            });

  
  export const SchemaRegister = z.object({
    email: z.string().email().min(1,{ message: 'need a email' }),
    username: z.string().min(1,{ message: 'need a first name' }),
    password: z.string().min(6, { message: 'at least 6 characters long' })
    ,
  });

  export interface categorie{
    id:string,
    name:string
  }

export  interface ArticleType {
    id:string
    name: string;
    description?: string;
    caractéristique?: string;
    pp: string;
    price: number;
    views: number;
    onAddToCart: () => void;
    photos : string[]
    hightlight?:string[],
    details?:string
    review:number,
    categorie:categorie
    amount:number
    reduction:number
    stripeid:string
  }
  
  export  interface ArticleComponents {
    name: string;
    description?: string;
    pp: string;
    price: number;
    views: number;
    stripeid:string;
    onAddToCart: () => void;
  }


  export interface sessionType{
    exp:number,
    roles:string[],
    username:string
}

export const categorieSchema = z.object({
  id:z.string(),
  name:z.string()
})


export const articleSchema = z.object({
  type: z.string(),
  name: z.string(),
  price: z.number(),
  description: z.string(),
  caractéristique: z.string(),
  photo: z.array(z.string()).nullable(),
  pp: z.string(),
  reduction: z.number(),
  details: z.string(),
  stripeid:z.string(),
  amount: z.number(),
  highlight: z.array(z.string()).nullable(),
  categorie: categorieSchema,
});

export type stripeType = {
  quantity:number
  price_data:{
    currency:string,
    product:string,
    unit_amount:number
  }
}