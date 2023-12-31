import Header from "@/Components/Header";
import PrimaryButton from "@/Components/PrimaryButton";
import { Link } from "@inertiajs/react";

export default function TopicPage(topic) {
  const { title, content, comment } = topic;
  const commentCount = comment.length;
  const currentUrl = window.location.href;

  return (
    <div>
      <Header />
      <div className="max-w-3xl mx-auto mt-8">
        <div className="bg-white rounded-lg shadow-md p-4 mb-4"> 
          <h2 className=" text-xl font-bold mb-2">{title}</h2>
          <PrimaryButton className="absolute right-40 top-40">
            Excluir tópico
          </PrimaryButton>
          <p className="text-gray-800">{content}</p>
          <div className="mt-4">
            {commentCount > 0 ? (
              <span className="px-2 py-1 bg-gray-200 rounded-md text-gray-800 text-sm">
                {commentCount}{" "}
                {commentCount === 1 ? "comentário" : "comentários"}
              </span>
            ) : (
              <></>
            )}
          </div>
          <div className="mt-4">
            <h3 className="bg-gray-100 text-lg font-bold mb-2">Comentários</h3>
            {comment.length > 0 ? (
              comment.map((comment) => (
                <div
                  key={comment.id}
                  className="flex items-center justify-between px-2 py-1 rounded-md text-gray-800 text-sm mb-2"
                >
                  <span>{comment.content}</span>
                  <div className="ml-auto">
                    <PrimaryButton className="mr-2 text-sm text-gray-600">
                      x
                    </PrimaryButton>
                    <PrimaryButton className="text-sm text-blue-600">
                      Edit
                    </PrimaryButton>
                  </div>
                </div>
              ))
            ) : (
              <span>Nenhum comentário disponível.</span>
            )}
          </div>
        </div>
        <PrimaryButton className="ml-4">
          <Link href={`/comments/new/${topic.id}`}>Comentar</Link>
        </PrimaryButton>
        <Link href="/">
          <PrimaryButton className="ml-4">Voltar</PrimaryButton>
        </Link>
      </div>
    </div>
  );
}
