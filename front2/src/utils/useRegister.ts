import { axiosInstance } from './instance';
import toast from 'react-hot-toast';
import { AxiosResponse, AxiosError } from 'axios'

interface RegisterData {
  email: string;
  password: string;
  username: string;
}

const register = async ({ email, password, username }: RegisterData) => {
  try {
    const response:AxiosResponse = await axiosInstance.post('/register', {
      email,
      password,
      username,
    });

    if (response && response.data && response.data.token) {
      return response.data;
    } else {
      throw new AxiosError('Registration failed');
    }
  } catch (error:any) {

    if (error.response!.status === 404) {
       toast.error('email already in use')
      }
    console.error(error);

    throw error;
  }
};

