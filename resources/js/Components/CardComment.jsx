
export default function CardComments(comments){

    return (
        <div className="bg-white rounded-lg shadow-lg p-10 mb-4">
          <p className="text-gray-800">{comments.content}</p>
        </div>
      );
}