import Header from '@/Components/Header';
import PrimaryButton from '@/Components/PrimaryButton';
import { Link, useForm } from '@inertiajs/react';

export default function AddComment({ topic }) {
  const { data, setData, post, processing } = useForm({
    topic_id: topic.id,
    title: '',
    content: '',
  });

  const handleSubmit = (e) => {
    console.log(data)
    e.preventDefault();

    post(`/topics/${data.topic_id}/comments`, {
      ...data,
      onSuccess: (response) => {
        console.log(data);
      },
      onError: (errors) => {
        console.log(errors);
      },
    });
  };

  const handleChange = (e) => {
    const { name, value } = e.target;
    setData((prevData) => ({
      ...prevData,
      [name]: value,
    }));
  };

  return (
    <>
    <Header/>
    <div className="bg-gray-100 p-4">
      <h2 className="text-xl font-bold mb-2">Adicionar Comentário</h2>
      <h3 className="text-lg font-semibold mb-4">Tópico: {topic.title}</h3>
      <form onSubmit={handleSubmit}>
        <div className="mb-4">
          <label className="block mb-2 font-semibold">Título:</label>
          <input
            type="text"
            name="title"
            value={data.title}
            onChange={handleChange}
            className="border border-gray-300 rounded px-3 py-2"
          />
        </div>
        <div className="mb-4">
          <label className="block mb-2 font-semibold">Conteúdo:</label>
          <textarea
            name="content"
            value={data.content}
            onChange={handleChange}
            className="border border-gray-300 rounded px-3 py-2"
          ></textarea>
        </div>
        <PrimaryButton
          type="submit"
          disabled={processing}
        >
          {processing ? 'Enviando...' : 'Enviar Comentário'}
        </PrimaryButton>
      </form>
      <Link href='/'>
      <PrimaryButton className='mt-2'>Voltar</PrimaryButton>
      </Link>
    </div>
    </>
  );
}
