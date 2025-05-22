import React from 'react';

const RecipeDetail = ({ background, resep, tahapPembuatan }) => {
  const parseGroupedList = (text) => {
    if (typeof text !== 'string') return [];

    if (!text.includes(':')) {
      // Format biasa (tanpa titik dua), hanya split koma
      const items = text
        .split(',')
        .map((item) => item.trim())
        .filter((item) => item.length > 0);
      return [{ title: null, items }];
    }

    // Format grouped (dengan titik dua)
    return text
      .split(/\r?\n\r?\n/) // Pisah per blok
      .map((block) => {
        const [titleLine, itemsLine] = block.split(':');
        if (!titleLine || !itemsLine) return null;

        const title = titleLine.trim();
        const items = itemsLine
          .split(',')
          .map((item) => item.trim())
          .filter((item) => item.length > 0);

        return { title, items };
      })
      .filter(Boolean);
  };

  const bahanGrouped = parseGroupedList(resep);
  const langkahGrouped = parseGroupedList(tahapPembuatan);

  return (
    <div className="space-y-8">
      {/* Deskripsi */}
      <section>
        <h2 className="text-2xl font-semibold mb-2">Deskripsi</h2>
        <p className="text-gray-700 text-justify">{background}</p>
      </section>

      {/* Bahan */}
      <section>
        <h2 className="text-2xl font-semibold mb-2">Bahan</h2>
        {bahanGrouped.map((group, index) => (
          <div key={index} className="mb-4">
            {group.title && (
              <h3 className="font-semibold mb-1">
                {String.fromCharCode(65 + index)}. {group.title}
              </h3>
            )}
            <ul className="list-disc list-inside text-gray-700">
              {group.items.map((item, i) => (
                <li key={i}>{item}</li>
              ))}
            </ul>
          </div>
        ))}
      </section>

      {/* Cara Memasak */}
      <section>
        <h2 className="text-2xl font-semibold mb-2">Cara Memasak</h2>
        {langkahGrouped.map((group, index) => (
          <div key={index} className="mb-4">
            {group.title && (
              <h3 className="font-semibold mb-1">
                {String.fromCharCode(65 + index)}. {group.title}
              </h3>
            )}
            <ol className="list-decimal list-inside text-gray-700 space-y-1">
              {group.items.map((step, i) => (
                <li key={i}>{step}</li>
              ))}
            </ol>
          </div>
        ))}
      </section>
    </div>
  );
};

export default RecipeDetail;
